<?php
//point??
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supervisor;
use App\Models\SupervisorDuty;
use App\Models\Week;
use App\Models\Criteria;
use App\Models\Advisor;
use Response;


class SupervisorDutyController extends Controller
{
    
    public function displaySupervisingTeam()
    { 
        $advisor = Advisor::findOrFail(Auth::id());
        $supervisorsIDs = $advisor->supervisors->pluck('id')->toArray();
        $supervisorDuties= SupervisorDuty::whereIn("supervisor_id" ,$supervisorsIDs)->get();

        foreach ($supervisorDuties as $SupervisorDuty){
            $data['teams'][] = $SupervisorDuty->supervisor->team . "-". $SupervisorDuty->leader_members ." leaders";
            $data['teamsFinalMark'][] = $SupervisorDuty->team_final_mark;
        }
        //follow_up_post
         $data['follow_up_post'][]= $supervisorDuties->where("follow_up_post","published")->count();
         $data['follow_up_post'][]= $supervisorDuties->where("follow_up_post","didnt publish")->count();
         $data['follow_up_post'][]= $supervisorDuties->where("follow_up_post","published instead")->count();
         $data['follow_up_post'][]= $supervisorDuties->where("follow_up_post","incomplete")->count();
        //mark_problems_post
         $data['mark_problems_post'][]= $supervisorDuties->where("mark_problems_post","published")->count();
         $data['mark_problems_post'][]= $supervisorDuties->where("mark_problems_post","didnt publish")->count();
         $data['mark_problems_post'][]= $supervisorDuties->where("mark_problems_post","published instead")->count();
         $data['mark_problems_post'][]= $supervisorDuties->where("mark_problems_post","incomplete")->count();
        //returning_ambassadors_post
         $data['returning_ambassadors_post'][]= $supervisorDuties->where("returning_ambassadors_post","تم المتابعة")->count();
         $data['returning_ambassadors_post'][]= $supervisorDuties->where("returning_ambassadors_post","تم المتابعة بعد 3 أيام")->count();
         $data['returning_ambassadors_post'][]= $supervisorDuties->where("returning_ambassadors_post","لم تتم المتابعة")->count();
        //new_ambassadors_post
        $data['new_ambassadors_post'][]= $supervisorDuties->where("new_ambassadors_post","تم المتابعة")->count();
        $data['new_ambassadors_post'][]= $supervisorDuties->where("new_ambassadors_post","نقص في المتابعة")->count();
        //withdrawn_ambassadors_post
         $data['withdrawn_ambassadors_post'][]= $supervisorDuties->where("withdrawn_ambassadors_post","تم المتابعة")->count();
         $data['withdrawn_ambassadors_post'][]= $supervisorDuties->where("withdrawn_ambassadors_post","تم المتابعة وتنبيه غير المتفاعلين")->count();
         $data['withdrawn_ambassadors_post'][]= $supervisorDuties->where("withdrawn_ambassadors_post","لم تتم المتابعة")->count();
        //leader_training
         $data['leader_training'][]= $supervisorDuties->where("leader_training","published")->count();
         $data['leader_training'][]= $supervisorDuties->where("leader_training","didnt publish")->count();
         $data['leader_training'][]= $supervisorDuties->where("leader_training","none")->count();
         $data['leader_training'][]= $supervisorDuties->where("leader_training","incomplete")->count();
        //discussion_post
         $data['discussion_post'][]= $supervisorDuties->where("discussion_post","published")->count();
         $data['discussion_post'][]= $supervisorDuties->where("discussion_post","didnt publish")->count();
         $data['discussion_post'][]= $supervisorDuties->where("discussion_post","none")->count();
         $data['discussion_post'][]= $supervisorDuties->where("discussion_post","incomplete")->count();
      

        $data = json_encode($data);
        return view('duties.display-supervising-team',compact('data'));//'teams','teamsFinalMark'));

    }

    public function supervisorDuty()
    { 
        $advisor = Advisor::where('user_id',Auth::id())->first();
        $supervisors = Supervisor::where('current_advisor',$advisor->id)->get();
        return view('duties.super-duties',compact('supervisors'));
    }

    public function supervisorDutyStore(Request $request)
    {
        $request->validate([
            'supervisor_id'=> 'required',
            'supervisor_reading'=> 'required',
        ]);
        $current_week = Week::latest()->pluck('id')->first();
        $advisor = Advisor::where('user_id',Auth::id())->first(); 
        SupervisorTask::updateOrCreate(
            ['supervisor_id' => $request->supervisor_id , "week_id" => $current_week],
            ['advisor_id' => $request->advisor_id,
            'advisor_id' => $advisor->id,
            'thursday_task' => ($request->supervisor_duties && in_array('thursday_task', $request->supervisor_duties)) ? 1 : 0,
            'final_mark_screenshot' => ($request->supervisor_duties && in_array('final_mark_screenshot', $request->supervisor_duties)) ? 1 : 0,
            'final_mark_confirm' => ($request->supervisor_duties && in_array('final_mark_confirm', $request->supervisor_duties)) ? 1 : 0,
            'supervisor_reading' => $request->supervisor_reading,
            'points' => ($request->supervisor_duties) ? count($request->supervisor_duties)*2 : 0,
            'no_of_pages' => ($request->no_of_pages) ? $request->no_of_pages : 0
        ]);

        return redirect()->back();
    }

     /**
     * Bring all supervisors of Auth advisor to show supervisors in view (duties.supervising-team).
     * @return supervisors;
     */

    public function supervisingTeam()
    { 
        $supervisors = Supervisor::where('current_advisor',auth()->user()->advisor->id)->get();
        return view('duties.supervising-team',compact('supervisors'));

      
    }

     /**
     * Store the value of valdions that are entered by auth advisor.
     * 
     * Detailed Steps:
     *  1- Advisor entered this valdions:
     *    [leader_members,team_final_mark,follow_up_post,mark_problems_post,
     *     returning_ambassadors_post,new_ambassadors_post,withdrawn_ambassadors_post,
     *     leader_training,discussion_post] .
     *  2- Advisor click "save" button
     *  3- This function[supervisingTeamStore] take the vlaues and calculation of the points 
     *     and stored in "supervisor_duties" Table.
     * cluac.
     * @param  Request  $request
     */
    public function supervisingTeamStore(Request $request)
    {   

        $current_week = Week::latest()->pluck('id')->first();
        $points = 0 ;

        if($request->returning_ambassadors_post == 'تم المتابعة'){
            $points += 3; 
        }
        
        if($request->new_ambassadors_post == 'تم المتابعة'){
            $points += 5; 
        } else {
            $new_ambassadors_post =($request->new_ambassadors_post_incomplete)? implode(",",$request->new_ambassadors_post_incomplete) : '';
            if ($request->new_ambassadors_post_incomplete && count($request->new_ambassadors_post_incomplete) == 1) {
                $points += (in_array('متابعة التواصل مع السفراء الجدد', $request->new_ambassadors_post_incomplete))? 2 : 3;
            }
        }

        if($request->withdrawn_ambassadors_post == 'تم المتابعة وتنبيه غير المتفاعلين'){
            $points += 3;
        } elseif ($request->withdrawn_ambassadors_post == 'تم المتابعة'){
            $points += 2;
        }
 
        if($request->leader_training == 'published'){
            $points += 3; 
        } elseif ($request->leader_training =='incomplete'){
            $points += 2;
        }
        if($request->discussion_post == 'published'){
            $points += 3;
        } elseif ($request->discussion_post =='incomplete'){
            $points += 2;
        }

            $duty = SupervisorDuty::updateOrCreate(
                ['supervisor_id' => $request->supervisor_id ,
                 'advisor_id' => auth()->user()->advisor->id,
                 'week_id' => $current_week],
                [
                'leader_members' =>  $request->leader_members,
                'team_final_mark' => $request->team_final_mark,
                'follow_up_post' =>  $request->follow_up_post,
                'mark_problems_post' => $request->mark_problems_post,
                'returning_ambassadors_post' => $request->returning_ambassadors_post,
                'new_ambassadors_post' => $request->new_ambassadors_post,
                'withdrawn_ambassadors_post' =>  $request->withdrawn_ambassadors_post,
                'leader_training' =>  $request->leader_training,
                'discussion_post' =>  $request->discussion_post,
                'points' => $points
                ]
            );

            if ($request->follow_up_post == 'incomplete' ) {
                $duty->points += 8 - count($request->follow_up_post_incomplete); 
                Criteria::updateOrCreate(
                    ['supervisor_duty_id' => $duty->id , "task_id" => 1],//follow_up_post
                    ['deficiencies' => implode(",",$request->follow_up_post_incomplete)]
                );

            } elseif($request->follow_up_post == 'published'){
                $duty->points += 8 ;   
            }

            if ($duty->mark_problems_post == 'incomplete' ) {
                $duty->points += 5 - count($request->mark_problems_post_incomplete); 
                $criteria = Criteria::updateOrCreate(
                    ['supervisor_duty_id' => $duty->id , "task_id" => 2],//mark_problems_post
                    ['deficiencies' => implode(",",$request->mark_problems_post_incomplete)]
                );
            } elseif($request->mark_problems_post == 'published'){
                $duty->points += 6 ;
            }   
            
            
            $duty->update(['points' =>$duty->points]); 
            return redirect()->back();
    }
   
    /**
         *show Supervisor duties to select supervisor.
    */
    public function show(Request $request) {

        $request->validate([
            'supervisor_id' => 'required',
        ]);

        $duty = SupervisorDuty::where('supervisor_id',$request->supervisor_id)->where('advisor_id',auth()->user()->advisor->id)
                                                ->first();
        if($duty){
        $criteria_1 = (Criteria::where('supervisor_duty_id',$duty->id) ->where('task_id',1)->first());
        $criteria_2 = (Criteria::where('supervisor_duty_id',$duty->id) ->where('task_id',2)->first());
        $criteria_3 = (Criteria::where('supervisor_duty_id',$duty->id) ->where('task_id',3)->first());

        return Response::json(['duty'=>$duty,'criteria_1'=>$criteria_1,'criteria_2'=>$criteria_2,'criteria_3'=>$criteria_3]);
        }
        else{
        return Response::json(['duty'=>$duty,'criteria_1'=>NULL,'criteria_2'=>NULL,'criteria_3'=>NULL]);
        }
    }


    
}