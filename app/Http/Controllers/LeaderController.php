<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Leader;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'team' => 'required',
            'name' => 'required',
            'type' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->jsonResponseWithoutMessage($validator->errors(), 'data', 500);
        }
            $request['supervisor_id']= 1;//Auth::id(); 
            $supervisor = Supervisor::where('id',1)->first();  
           $request['advisor_id'] = $supervisor->current_advisor;   
            leader::create($request->all());
            echo "ok";
          return $this->jsonResponseWithoutMessage("leader Craeted Successfully", 'data', 200);

    }
    public function swap_leader(Request $request){
        $validator = Validator::make($request->all(), [
            'supervisor_1' => 'required',
            'supervisor_2' => 'required',

        ]);
        $supervisor_1 = leader::where('supervisor_id', $request->supervisor_1)->get();
        $supervisor_2 = leader::where('supervisor_id', $request->supervisor_2)->get();
        if($supervisor_1->isNotEmpty() && $supervisor_2->isNotEmpty()){
            foreach ($supervisor_1 as $row) {
                $row->update(['supervisor_id'=>$request->supervisor_2]);
            }
            foreach ($supervisor_2 as $row) {
                $row->update(['supervisor_id'=>$request->supervisor_1]);
            }
        }
        else
           echo "The supervisor is not found";
    }
    public function transfer_leader(Request $request){
        $validator = Validator::make($request->all(), [
            'leader_id' => 'required',
            'supervisor_id' => 'required',
        ]);
        $leader = leader::where('id', $request->leader_id)->first();
        if($leader){
            $previous_supervisor = $leader->supervisor_id;
            $leader->update(['supervisor_id'=>$request->supervisor_id]);
            echo "update leader is done";
            $a = $this->check_active_supervisor($previous_supervisor);
            echo $a;
        }
        else{
            echo "This leader is not found";

        }
    }
    public function check_active_supervisor($supervisor_id){

        $supervisor = leader::where('supervisor_id',$supervisor_id)->get();
        if($supervisor->isNotEmpty()){
            return "this supervisor is active";
        }
        else{
            $supervisor = supervisor::where('id', $supervisor_id)->first();
            $user = user::where('id', $supervisor->id)->first();
            $user->update(['is_active'=>0]);
            return "this supervisor is not active";

        }
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supervisor_id' => 'required_without:advisor_id,type',
            'advisor_id' => 'required_without:supervisor_id,type',
            'type' => 'required_without:supervisor_id,advisor_id',
        ]);
        if ($validator->fails()) {
            echo "errors";
            //return $this->jsonResponseWithoutMessage($validator->errors(), 'data', 500);
        }
        if($request->has('supervisor_id'))
            $leader = leader::where('supervisor_id', $request->supervisor_id)->get();
        else if($request->has('advisor_id'))
            $leader = leader::where('advisor_id', $request->advisor_id)->get();
        else if($request->has('type'))
            $leader = leader::where('type', $request->type)->get();
        if($leader->isNotEmpty()){
            echo $leader; 
           // return $this->jsonResponseWithoutMessage(RateResource::collection($rate), 'data',200);
        }
        else{
            throw new NotFound;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'leader_id' => 'required',
        ]);
        if ($validator->fails()) {
            echo "errors";

           // return $this->jsonResponseWithoutMessage($validator->errors(), 'data', 500);
        }
       // if(Auth::user()->can('edit leader')){
         $leader = leader::where('supervisor_id', 1)->where('id', $request->leader_id)->first();
        //}
         if($leader){
            $leader->update($request->all());
            echo "leader info Updated Successfully";
           // return $this->jsonResponseWithoutMessage("leader info Updated Successfully", 'data', 200);
        }
        else{
            echo"NotFound";
           // throw new NotFound;  
        }
        
    }

}
