<?php
//point??
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supervisor;
use App\Models\Week;
use App\Models\Criteria;
use App\Models\SupervisorTask;
use App\Models\Advisor;
use Response;



class SupervisorTasksController extends Controller
{
     /**
     * Bring all supervisors of Auth advisor.
     * @return supervisors;
     */
    public function supervisorTask()
    { 
        $supervisors = Supervisor::where('current_advisor',auth()->user()->advisor->id)->get();
        return view('duties.super-duties',compact('supervisors'));
    }
    /**
     * Store the value of valdions that are entered by auth advisor.
     * 
     * Detailed Steps:
     *  1- Advisor entered this valdions:
     *    [thursday_task,final_mark_screenshot,final_mark_confirm,supervisor_reading] .
     *  2- Advisor click "save" button
     *  3-This function[supervisorTaskStore] take the vlaues and stored in "SupervisorTask" Table.
     * @param  Request  $request
     */
    public function supervisorTaskStore(Request $request)
    {
        $request->validate([
            'supervisor_id'=> 'required',
            'supervisor_reading'=> 'required',
        ]);
        $current_week = Week::latest()->pluck('id')->first();
        SupervisorTask::updateOrCreate(
            ['supervisor_id' => $request->supervisor_id ,
             'advisor_id' => auth()->user()->advisor->id,
             'week_id' => $current_week
            ],
            [
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
         *show Supervisor Task to select supervisor.
    */
    public function show(Request $request) {

        $request->validate([
            'supervisor_id' => 'required',
        ]);

        $duty =  SupervisorTask::where('supervisor_id',$request->supervisor_id)
                            ->where('advisor_id',auth()->user()->advisor->id)
                            ->first();
        
        return Response::json(['duty'=>$duty]);
        
    }
    
}
