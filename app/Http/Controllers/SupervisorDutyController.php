<?php

namespace App\Http\Controllers;

use App\Models\supervisorDuty;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SupervisorDutyController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supervisor_id' => 'required',
            'week_id' => 'required',
            'thursday_task' => 'required',
            'team_final_mark' => 'required',
            'final_mark_post' => 'required',
            'supervisor_reading' => 'required',

        ]);
        if ($validator->fails()) {
            echo "validator errors";
        }
        $request['advisor_id'] = 1;//Auth::id(); 
        supervisorDuty::create($request->all());
        $this->add_points($request['supervisor_id'], $request['advisor_id']);
        echo "leader Craeted Successfully";
    }
    public function add_points($supervisor_id,$advisor_id){
        $points = 0;
        $supervisor = supervisorDuty::where('advisor_id', $advisor_id)
                                    ->where('supervisor_id', $supervisor_id)
                                    ->first();
                                    echo $supervisor_id ;echo $advisor_id;
       if($supervisor){
            if( $supervisor->thursday_task == 'done')
            {
                $points =$points+2 ;
            }
            if($supervisor->team_final_mark != 0)
            {
                $points =$points+2 ;
            }
           
            if( $supervisor->final_mark_post == 'published')
            {
                $points =$points+2 ;
            }
           
            $supervisor->points = $points ; 
        $supervisor->update();
        }
        
    }
   
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supervisor_id' => 'required',
            'thursday_task' => 'required',
            'team_final_mark' => 'required',
            'final_mark_post' => 'required',
            'supervisor_reading' => 'required',

        ]);
        if ($validator->fails()) {
            echo "validator errors";
        }
        
         $supervisor = supervisorDuty::where('advisor_id', 1)->where('supervisor_id', $request->supervisor_id)->first();
         if($supervisor){
            $supervisor->update($request->all());
            $this->add_points($request['supervisor_id'], 1);//Auth::id();
            echo "supervisor info Updated Successfully";
        }
        
        else{
            echo "NotFound";
        }
    }

}
