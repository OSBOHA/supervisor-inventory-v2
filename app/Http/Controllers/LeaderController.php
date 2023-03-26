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

     /**
      *  Selected the page that user wanted.
      * @param  $name_route,$type_page.
      *  There is tow type of page :-
      *    1- add(in this page the user can add a new leader).
      *    2- update(in this page the user can update exsit leader).
     */
    
    public function create($type_page){
        return view ('leader.manipulat-leader',compact('type_page'));
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
     /**
      *  Bring all supervisors of Auth advisor to show supervisors in view (leader.transfer).
     */
    public function transferLeader($leader_id){
        $leader = leader::find($leader_id);
        $supervisors = supervisor::where('current_advisor', auth()->user()->Supervisor->current_advisor)->get();
        return view('leader.transfer', compact('leader','supervisors'));
    }
    /**
      *  transfer a selected Leader to anthor supervisor and check is supervisor active.
     */
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
        return back()->with(['status' => $status, 'message' => $msg]);
    }
     /**
      *  after transfer a Leader from supervisor, check is supervisor active.
     */
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
    /**
      *  Show all leaders by:supervisor or advisor or type of leader['withdrawn', 'support', 'permanent']  in view (leader.list-all-by).
     */

    public function listBy($type_page,$user_id)
    {
        
        if($type_page =='supervisor')
            $leaders = leader::where('supervisor_id', $user_id)->get();
        else if($type_page =='advisor')
            $leaders = leader::where('advisor_id', $user_id)->get();
        else if($type_page =='type')
            $leaders = leader::where('type', $request->type)->get();
        if($leaders->isNotEmpty()){
            return view('leader.list-all-by', compact('leaders'));
        }
        else{
            echo "not found";
        }
       
    }
    /**
      *  Show all leaders in view (leader.lis-all).
     */
    public function listAll()
    {
        $leaders = leader::get();
        return view('leader.lis-all', compact('leaders'));

    }
     /**
      * get information about a selected leader and show it in view (leader.manipulat-leader).
     */
    public function manipulatLeader($type_page,$leader_id)
    {
        $leader = leader::where('id',$leader_id)->first();
        return view('leader.manipulat-leader', compact('type_page','leader'));
    }
    /**
      * manipulat Leader:
      * 1)Add new leader.
      * 2)Update exsite leader.
      * 3)Delete leader[in one case:if this leader don't have date in FollowupTeamDuty table].
     */
    public function manipulatLeaderStore(Request $request){
        
        if($request->has('add')){
            leader::updateOrCreate(
                ['supervisor_id' => auth()->user()->Supervisor->id,
                'advisor_id'     => auth()->user()->Supervisor->current_advisor,
                'team'           => $request->team,
                'name'           => $request->name,
                'type'           => $request->type,
            ]);
            $status = 'success';
            $msg = "!تم إضافة القائد بنجاح";
        }
        if($request->has('update')){
            leader::updateOrCreate([
                'id'             => $request->leader_id],
                ['supervisor_id' => auth()->user()->Supervisor->id,
                'advisor_id'     => auth()->user()->Supervisor->current_advisor,
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
       return back()->with(['status' => $status, 'message' => $msg]);

    } 
    public function withoutSupervisor(){
        $leaders = leader::where('supervisor_id',NULL)->get();
        return view('leader.without-supervisor', compact('leaders'));

    }
    
}
