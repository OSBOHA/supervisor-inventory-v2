<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Leader;
use App\Models\Supervisor;
use App\Models\FollowupTeamDuty;



class LeaderController extends Controller
{
    public function create($name_route,$type_page){
        return view ('leader.manipulat-leader',compact('name_route','type_page'));
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
    public function transferLeader($name_route,$leader_id){
        $leader = leader::find($leader_id);
        $supervisors = supervisor::where('current_advisor', 3)->get();
        return view('leader.transfer', compact('leader','supervisors','name_route'));
    }
    public function transferLeaderStore(Request $request){
        $validator = Validator::make($request->all(), [
            'leader_id' => 'required',
            'supervisor_id' => 'required',
        ]);
        $leader = leader::find($request->leader_id);
        if($leader){
           $previous_supervisor = $leader->supervisor_id;
           $leader->update(['supervisor_id'=>$request->supervisor_id]);
           //$this->check_active_supervisor($previous_supervisor);
           $status = 'success';
           $msg = "تم النقل بنجاح";
        }
        else{
            $status = 'danger';
            $msg = "هذا القائد غير موجود";

        }
        return redirect()->route($request->name_route)->with(['status' => $status, 'message' => $msg]);
    }
    public function check_active_supervisor($supervisor_id){

        $supervisor = leader::where('supervisor_id',$supervisor_id)->get();
        if($supervisor->isNotEmpty()){
            //echo "this supervisor is active";
        }
        else{
            $supervisor = supervisor::find($supervisor_id);
            $user = user::find($supervisor->user_id);
            $user->is_active = 0;
            $user->save();
            //echo "this supervisor is not active";
        }
    }

    public function listBy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supervisor_id' => 'required_without:advisor_id,type',
            'advisor_id' => 'required_without:supervisor_id,type',
            'type' => 'required_without:supervisor_id,advisor_id',
        ]);
        if($request->has('supervisor_id'))
            $leaders = leader::where('supervisor_id', $request->supervisor_id)->get();
        else if($request->has('advisor_id'))
            $leaders = leader::where('advisor_id', $request->advisor_id)->get();
        else if($request->has('type'))
            $leaders = leader::where('type', $request->type)->get();
        if($leaders->isNotEmpty()){
            return view('leader.list-all-by', compact('leaders'));
        }
        else{
            echo "not found";
        }
       
    }
    public function listAll()
    {
        $leaders = leader::get();
        return view('leader.lis-all', compact('leaders'));

    }
    public function manipulatLeader($name_route,$type_page,$leader_id)
    {
        $leader = leader::where('id',$leader_id)->first();
        return view('leader.manipulat-leader', compact('name_route','type_page','leader'));
    }
    public function manipulatLeaderStore(Request $request){
        $supervisor = Supervisor::where('user_id',Auth::id())->first();
        if($request->has('add')){
            leader::updateOrCreate(
                ['supervisor_id' => $supervisor->id,
                'advisor_id'     => $supervisor->current_advisor,
                'team'           => $request->team,
                'name'           => $request->name,
                'type'           => $request->type,
            ]);
            $status = 'success';
            $msg = "!تم إضافى القائد بنجاح";
        }
        if($request->has('update')){
            leader::updateOrCreate([
                'id'             => $request->leader_id],
                ['supervisor_id' => $supervisor->id,
                'advisor_id'     => $supervisor->current_advisor,
                'team'           => $request->team,
                'name'           => $request->name,
                'type'           => $request->type,
            ]);
            $status = 'success';
            $msg = "!تم التعديل بنجاح";
        }
        if($request->has('delete')){
            $leader = FollowupTeamDuty::where('leader_id',$request->leader_id)->first();
            if($leader){
                $status = 'danger';
                $msg = "لا يمكن حذف القائد";
            }
            else{
                leader::find($request->leader_id)->delete();
                $status = 'success';
                $msg = "!تم الحذف بنجاح";
            }
         }
       return redirect()->route($request->name_route)->with(['status' => $status, 'message' => $msg]);

    } 
    public function withoutSupervisor(){
        $leaders = leader::where('supervisor_id',NULL)->get();
        return view('leader.without-supervisor', compact('leaders'));

    }
    
}
