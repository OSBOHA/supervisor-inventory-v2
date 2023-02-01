<?php
//point??
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supervisor;
use App\Models\SupervisorDuty;
use App\Models\Week;
use App\Models\Criteria;
use App\Models\SupervisorTask;



class SupervisorDutyController extends Controller
{
    public function supervisorDuty()
    { 
        $supervisors = Supervisor::where('current_advisor',3)->get();//Auth::id())->get();
        return view('duties.super-duties',compact('supervisors'));
    }

    public function supervisorDutyStore(Request $request)
    {
        $request->validate([
            'supervisor_id'=> 'required',
            'supervisor_reading'=> 'required',
        ]);
        $current_week = Week::latest()->pluck('id')->first();

        SupervisorTask::updateOrCreate(
            ['supervisor_id' => $request->supervisor_id , "week_id" => $current_week],
            ['advisor_id' => $request->advisor_id,
            'advisor_id' => 5,//Auth::id(),
            'thursday_task' => ($request->supervisor_duties && in_array('thursday_task', $request->supervisor_duties)) ? 1 : 0,
            'final_mark_screenshot' => ($request->supervisor_duties && in_array('final_mark_screenshot', $request->supervisor_duties)) ? 1 : 0,
            'final_mark_confirm' => ($request->supervisor_duties && in_array('final_mark_confirm', $request->supervisor_duties)) ? 1 : 0,
            'supervisor_reading' => $request->supervisor_reading,
            'points' => ($request->supervisor_duties) ? count($request->supervisor_duties)*2 : 0,
            'no_of_pages' => ($request->no_of_pages) ? $request->no_of_pages : 0
        ]);

        return redirect()->back();
    }

    public function supervisingTeam()
    { 
        $supervisors = Supervisor::where('current_advisor',3)->get();//Auth::id())->get();
        return view('duties.supervising-team',compact('supervisors'));
    }

    public function supervisingTeamStore(Request $request)
    {   
     /*   $request->validate([
            'supervisor_id'  => 'required',
            'leader_members'  => 'required',
            'team_final_mark'  => 'required',
            'follow_up_post'  => 'required',
            'mark_problems_post'  => 'required',
            'returning_ambassadors_post'  => 'required',
            'new_ambassadors_post'  => 'required',
            'withdrawn_ambassadors_post'  => 'required',
            'leader_training'  => 'required',
            'discussion_post'  => 'required',
        ]);*/

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
                ["supervisor_id" => $request->supervisor_id , "week_id" => $current_week],
                ['advisor_id' =>  3, //Auth::id();
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

    
}
