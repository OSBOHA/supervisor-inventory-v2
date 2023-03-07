<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function followup_team_duty(){
        return $this->belongsTo(FollowupTeamDuty::class);
    }
    public function supervisors_duty(){
        return $this->belongsTo(SupervisorDuty::class);
    }
}
