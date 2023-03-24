<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowupTeamDuty;
use Illuminate\Support\Facades\Auth;
use App\Models\Supervisor;
use App\Models\Leader;
use App\Models\Week;
use App\Models\Criteria;
use App\Models\Photo;
use Response;


class followupTeamController extends Controller
{
    
    /**
     * Bring all leaders of Auth supervisor to show leaders in view (duties.sfollowup-team).
     * @return leaders;
     */
    public function bring_leaders()
    { 
        $leaders = Leader::where('supervisor_id',auth()->user()->supervisor->id)->get();
        return view ('duties.followup-team',compact('leaders'));
    }
     /**
     * Bring all supervisors of Auth advisor to show supervisors in view (duties.sfollowup-team).
     * @return supervisors;
     */
    public function bring_supervisors()
    { 
        $supervisors = Supervisor::where('current_advisor',auth()->user()->advisor->id)->get();
        return view('duties.followup-team',compact('supervisors'));
    }

    /**
     * Store the value of valdions that are entered by auth supervisor.
     * 
     * Detailed Steps:
     *  1- supervisor entered valdions.
     *  2- supervisor click "save" button
     *  3- This function[followupTeamDuty_leader_store] take the vlaues and calculation of the points 
     *     and stored in "supervisor_duties" Table.
     * 
     * @param  Request  $request
     */
   
    public function followupTeamDuty_leader_store(Request $request)
    {
        $request->validate([
            'leader_id'=> 'required',
            'team_final_mark'=> 'required',
            'team_members'=> 'required',
            'follow_up_post'=> 'required',
            'about_asboha_post'=> 'required',
            'zero_mark'=> 'required',
            'frozen_ambassadors'=> 'required',
            'friday_task'=> 'required',
            'thursday_task'=> 'required',
            'leader_training'=> 'required',
            'discussion_post'=> 'required',
            'final_mark'=> 'required',
            'audit_final_mark'=> 'required',
            'withdrawn_ambassadors'=> 'required',
            'leader_reading'=> 'required',
        ]);
        $current_week = Week::latest()->pluck('id')->first();

      
        if(auth()->user()->hasRole('supervisor')) {
            $last_edit_by  = Auth::id(); 
            $leader = Leader::find($request->leader_id);
            $advisor_id = $leader->advisor_id; 
        }

        $duty = FollowupTeamDuty::updateOrCreate(
            ["leader_id" => $request->leader_id , "week_id" => $current_week],
            ['advisor_id' => $advisor_id , 
            'last_edit_by'=> $last_edit_by,
            'team_final_mark'=>  $request->team_final_mark,
            'team_members'=>  $request->team_members,
            'follow_up_post'=>  $request->follow_up_post,
            'about_asboha_post'=>  $request->about_asboha_post,
            'zero_mark'=>  (!$request->zero_mark)? 0 : $request->zero_mark_NO ,
            'frozen_ambassadors'=>  (!$request->frozen_ambassadors)? 0 : $request->frozen_ambassadors_NO,
            'friday_task'=>  ($request->friday_task == 0) ? false : true,
            'thursday_task'=>  ($request->thursday_task == 0) ? false : true,
            'leader_training'=>  $request->leader_training,
            'discussion_post'=>  $request->discussion_post,
            'final_mark'=>  $request->final_mark,
            'audit_final_mark'=>  $request->audit_final_mark,
            'withdrawn_ambassadors'=>  $request->withdrawn_ambassadors,
            'withdrawn_ambassadors_No'=> $request->withdrawn_ambassadors_No,
            'leader_reading'=>  $request->leader_reading,
            'about_leader'=>  $request->about_leader,
            ]);

        //points
        $points = 0;
        if ($duty->follow_up_post == 'incomplete' && $request->follow_up_post_incomplete){
            $points += 8 - count($request->follow_up_post_incomplete); 
            Criteria::updateOrCreate(
                ['leader_duty_id' => $duty->id , "task_id" => 1],//follow_up_post
                ['deficiencies' => implode(",",$request->follow_up_post_incomplete)]
            );
        } else {
            $criteria = Criteria::where(['leader_duty_id' => $duty->id , "task_id" => 1])->first();
            if($criteria){$criteria->delete();}
            if ($duty->follow_up_post == 'published'){
                $points += 8;
            }
        }
        
        if ($duty->about_asboha_post == 'incomplete' && $request->about_asboha_post_incomplete){
            $points += 4 - count($request->about_asboha_post_incomplete); 
            Criteria::updateOrCreate(
            ['leader_duty_id' => $duty->id , "task_id" => 2],//about_asboha_post
            ['deficiencies' => implode(",",$request->about_asboha_post_incomplete)]
            );
        } else {
            $criteria = Criteria::where(['leader_duty_id' => $duty->id , "task_id" => 2])->first();
            if($criteria){$criteria->delete();}
            if ($duty->about_asboha_post == 'published'){ 
                $points += 4; 
            } 
        }
 
        if ($duty->friday_task == true){
            $points += 2;
        }
        
        if ($duty->thursday_task == true){
            $points += 2;
        }
        
        if ($duty->leader_training == 'published'){
            $points += 3;
        } elseif($duty->leader_training == 'incomplete'){
            $points += 2; 
        }
        
        if ($duty->discussion_post == 'published'){
            $points += 3;
        } elseif($duty->discussion_post == 'incomplete'){
            $points += 2; 
        }
        
        if ($duty->final_mark == 'published'){
            $points += 4;
        }
        
        if ($duty->audit_final_mark == 'done'){
            $points += 1;
            $photo[0]= $request->audit_leader_messaging_reply;
            if ($request->audit_leader_messaging_1) { array_push($photo, $request->audit_leader_messaging_1); }
            if ($request->audit_leader_messaging_2) { array_push($photo, $request->audit_leader_messaging_2); }
            if ($request->audit_leader_messaging_3) { array_push($photo, $request->audit_leader_messaging_3); }
            $photo =  implode(",",$photo);
            Photo::updateOrCreate(
                ['duty_id' => $duty->id , "title" => "audit_final_mark"],
                ['photo' => $photo  ]
            );
        } else {
            $photo = Photo::where(['duty_id' => $duty->id , "title" => "audit_final_mark"])->first();
            if($photo){ $photo->delete();}
        }

        if ($duty->withdrawn_ambassadors == 'not done'){
            $photo = $request->withdrawn_ambassadors_message;
            Photo::updateOrCreate(
                ['duty_id' => $duty->id , "title" => "withdrawn_ambassadors"],
                ['photo' => $photo]
            );
        } else {
            $photo = Photo::where(['duty_id' => $duty->id , "title" => "withdrawn_ambassadors"])->first();
            if($photo){ $photo->delete();}
            if ($duty->withdrawn_ambassadors == 'no withdrawal'){
                $duty->update(['withdrawn_ambassadors_No' => 0]); 
                $points += 1;
            }
        }
        $duty->update(['points' =>$points]); 
       return redirect()->back();
    }
        /**
     * Store the value of valdions that are entered by auth advisor.
     * 
     * Detailed Steps:
     *  1- advisor entered  valdions.
     *  2- advisor click "save" button
     *  3- This function[followupTeamDuty_supervisor_store] take the vlaues and calculation of the points 
     *     and stored in "FollowupTeamDuty" Table.
     * 
     * @param  Request  $request
     */
   
    public function followupTeamDuty_supervisor_store(Request $request)
    {
        $request->validate([
            'supervisor_id'=> 'required',
            'team_final_mark'=> 'required',
            'team_members'=> 'required',
            'follow_up_post'=> 'required',
            'about_asboha_post'=> 'required',
            'zero_mark'=> 'required',
            'frozen_ambassadors'=> 'required',
            'friday_task'=> 'required',
            'thursday_task'=> 'required',
            'leader_training'=> 'required',
            'discussion_post'=> 'required',
            'final_mark'=> 'required',
            'audit_final_mark'=> 'required',
            'withdrawn_ambassadors'=> 'required',
            'leader_reading'=> 'required',
        ]);
        $current_week = Week::latest()->pluck('id')->first();

        if(auth()->user()->hasRole('advisor')){
            $last_edit_by  = Auth::id(); 
            $supervisor = Supervisor::find($request->supervisor_id);
            $advisor_id = $supervisor->current_advisor; 
        }

    

        $duty = FollowupTeamDuty::updateOrCreate(
            ["supervisor_id" => $request->supervisor_id , "week_id" => $current_week],
            ['advisor_id' => $advisor_id , 
            'last_edit_by'=> $last_edit_by,
            'team_final_mark'=>  $request->team_final_mark,
            'team_members'=>  $request->team_members,
            'follow_up_post'=>  $request->follow_up_post,
            'about_asboha_post'=>  $request->about_asboha_post,
            'zero_mark'=>  (!$request->zero_mark)? 0 : $request->zero_mark_NO ,
            'frozen_ambassadors'=>  (!$request->frozen_ambassadors)? 0 : $request->frozen_ambassadors_NO,
            'friday_task'=>  ($request->friday_task == 0) ? false : true,
            'thursday_task'=>  ($request->thursday_task == 0) ? false : true,
            'leader_training'=>  $request->leader_training,
            'discussion_post'=>  $request->discussion_post,
            'final_mark'=>  $request->final_mark,
            'audit_final_mark'=>  $request->audit_final_mark,
            'withdrawn_ambassadors'=>  $request->withdrawn_ambassadors,
            'withdrawn_ambassadors_No'=> $request->withdrawn_ambassadors_No,
            'leader_reading'=>  $request->leader_reading,
            'about_leader'=>  $request->about_leader,
            ]);

        //points
        $points = 0;
        if ($duty->follow_up_post == 'incomplete' && $request->follow_up_post_incomplete){
            $points += 8 - count($request->follow_up_post_incomplete); 
            Criteria::updateOrCreate(
                ['supervisor_duty_id' => $duty->id , "task_id" => 1],//follow_up_post
                ['deficiencies' => implode(",",$request->follow_up_post_incomplete)]
            );
        } else {
            $criteria = Criteria::where(['supervisor_duty_id' => $duty->id , "task_id" => 1])->first();
            if($criteria){$criteria->delete();}
            if ($duty->follow_up_post == 'published'){
                $points += 8;
            }
        }
        
        if ($duty->about_asboha_post == 'incomplete' && $request->about_asboha_post_incomplete){
            $points += 4 - count($request->about_asboha_post_incomplete); 
            Criteria::updateOrCreate(
            ['supervisor_duty_id' => $duty->id , "task_id" => 2],//about_asboha_post
            ['deficiencies' => implode(",",$request->about_asboha_post_incomplete)]
            );
        } else {
            $criteria = Criteria::where(['supervisor_duty_id' => $duty->id , "task_id" => 2])->first();
            if($criteria){$criteria->delete();}
            if ($duty->about_asboha_post == 'published'){ 
                $points += 4; 
            } 
        }
 
        if ($duty->friday_task == true){
            $points += 2;
        }
        
        if ($duty->thursday_task == true){
            $points += 2;
        }
        
        if ($duty->leader_training == 'published'){
            $points += 3;
        } elseif($duty->leader_training == 'incomplete'){
            $points += 2; 
        }
        
        if ($duty->discussion_post == 'published'){
            $points += 3;
        } elseif($duty->discussion_post == 'incomplete'){
            $points += 2; 
        }
        
        if ($duty->final_mark == 'published'){
            $points += 4;
        }
        
        if ($duty->audit_final_mark == 'done'){
            $points += 1;
            $photo[0]= $request->audit_leader_messaging_reply;
            if ($request->audit_leader_messaging_1) { array_push($photo, $request->audit_leader_messaging_1); }
            if ($request->audit_leader_messaging_2) { array_push($photo, $request->audit_leader_messaging_2); }
            if ($request->audit_leader_messaging_3) { array_push($photo, $request->audit_leader_messaging_3); }
            $photo =  implode(",",$photo);
            Photo::updateOrCreate(
                ['duty_id' => $duty->id , "title" => "audit_final_mark"],
                ['photo' => $photo  ]
            );
        } else {
            $photo = Photo::where(['duty_id' => $duty->id , "title" => "audit_final_mark"])->first();
            if($photo){ $photo->delete();}
        }

        if ($duty->withdrawn_ambassadors == 'not done'){
            $photo = $request->withdrawn_ambassadors_message;
            Photo::updateOrCreate(
                ['duty_id' => $duty->id , "title" => "withdrawn_ambassadors"],
                ['photo' => $photo]
            );
        } else {
            $photo = Photo::where(['duty_id' => $duty->id , "title" => "withdrawn_ambassadors"])->first();
            if($photo){ $photo->delete();}
            if ($duty->withdrawn_ambassadors == 'no withdrawal'){
                $duty->update(['withdrawn_ambassadors_No' => 0]); 
                $points += 1;
            }
        }
        $duty->update(['points' =>$points]); 
       return redirect()->back();
    }
     //show followup team duties to select supervisor.
     public function followupTeamDuty_show_supervisor(Request $request) {

        $request->validate([
            'supervisor_id' => 'required',
        ]);

        $duty = FollowupTeamDuty::where('supervisor_id',$request->supervisor_id)->where('advisor_id',auth()->user()->advisor->id)
                                                ->first();
        if($duty){
        $criteria_1 = (Criteria::where('leader_duty_id',$duty->id) ->where('task_id',1)->first());
        $criteria_2 = (Criteria::where('leader_duty_id',$duty->id) ->where('task_id',2)->first());
        return Response::json(['duty'=>$duty,'criteria_1'=>$criteria_1,'criteria_2'=>$criteria_2]);
        }
        else{
        return Response::json(['duty'=>$duty,'criteria_1'=>NULL,'criteria_2'=>NULL]);
        }
    }
         //show followup team duties to select leader.

    public function followupTeamDuty_show_leader(Request $request) {

        $request->validate([
            'leader_id' => 'required',
        ]);

        $duty = FollowupTeamDuty::where('leader_id',$request->leader_id)->first();
                                                
        if($duty){
        $criteria_1 = (Criteria::where('leader_duty_id',$duty->id) ->where('task_id',1)->first());
        $criteria_2 = (Criteria::where('leader_duty_id',$duty->id) ->where('task_id',2)->first());
        return Response::json(['duty'=>$duty,'criteria_1'=>$criteria_1,'criteria_2'=>$criteria_2]);
        }
        else{
        return Response::json(['duty'=>$duty,'criteria_1'=>NULL,'criteria_2'=>NULL]);
        }
    }


   
}
