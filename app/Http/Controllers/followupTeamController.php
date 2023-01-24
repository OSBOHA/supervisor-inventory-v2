<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowupTeamDuty;
use Illuminate\Support\Facades\Auth;
use App\Models\Leader;
use App\Models\Week;



class followupTeamController extends Controller
{
    public function index()
    { 
        $leaders = Leader::where('supervisor_id',Auth::id())->get();
        return view('duties.followup-team',compact('leaders'));
    }


    public function store(Request $request)
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

        $leader = Leader::find($request->leader_id);
        $supervisor_id = $leader->supervisor_id;
        $advisor_id = $leader->advisor_id;

        if(!auth()->user()->hasRole('supervisor')){
            $last_edit_by  = Auth::id(); 
            $request->last_edit_by = $last_edit_by;  
        }

        $duty = FollowupTeamDuty::updateOrCreate(
            ["leader_id" => $request->leader_id , "week_id" => $current_week],
            ['advisor_id' => $advisor_id , 
            'supervisor_id' => $supervisor_id,
            'last_edit_by'=> $request->last_edit_by,
            'team_final_mark'=>  $request->team_final_mark,
            'team_members'=>  $request->team_members,
            'follow_up_post'=>  $request->follow_up_post,
            'about_asboha_post'=>  $request->about_asboha_post,
            'zero_mark'=>  $request->zero_mark,
            'frozen_ambassadors'=>  $request->frozen_ambassadors,
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
    }

    /*
    //points
    $points = 0;
    if ($duty->follow_up_post == 'published'){
        $points += 8;
    } elseif($duty->follow_up_post == 'incomplete' && $request->follow_up_post_incomplete){
        $points += 8 - count($request->follow_up_post_incomplete); 
        $criteria = Criteria::updateOrCreate(
            ['leader_duty_id' => $duty->id , "task_id" => 1],//follow_up_post
            ['deficiencies' => implode(",",$request->follow_up_post_incomplete)]
        );
}
    
    if ($duty->about_asboha_post == 'published'){
        $points += ;
    } elseif($duty->about_asboha_post == 'incomplete' && $request->about_asboha_post_incomplete){
        $points +=  - count($request->about_asboha_post_incomplete); 
        $criteria = Criteria::updateOrCreate(
        ['leader_duty_id' => $duty->id , "task_id" => 2],//about_asboha_post
        ['deficiencies' => implode(",",$request->about_asboha_post_incomplete)]
        );
    }

    if ($duty->friday_task == true){
        $points += ;
    }
    
    if ($duty->thursday_task == true){
        $points += ;
    }

    if ($duty->leader_training == 'published'){
        $points += ;
    } elseif($duty->leader_training == 'incomplete' && $request->leader_training_incomplete){
        $points +=  - count($request->leader_training_incomplete); 
        $criteria = Criteria::updateOrCreate(
        ['leader_duty_id' => $duty->id , "task_id" => 3],//leader_training
        ['deficiencies' => implode(",",$request->leader_training_incomplete)]
        );

    }

    if ($duty->discussion_post == 'published'){
        $points += ;
    } elseif($duty->discussion_post == 'incomplete'){
        $points +=  - count($request->discussion_post_incomplete); 
        $criteria = Criteria::updateOrCreate(
        ['leader_duty_id' => $duty->id , "task_id" => 4],//discussion_post
        ['deficiencies' => implode(",",$request->discussion_post_incomplete)]
        );
    }

    if ($duty->final_mark == 'published'){
        $points += ;
    }

    if ($duty->audit_final_mark == 'done'){
        $points += ;
        //photo
    }

    if ($duty->withdrawn_ambassadors == 'no withdrawal'){
        $points += ;
    } elseif($duty->withdrawn_ambassadors == 'done'){
        //photo
    } 

    */


}
