<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'supervisor_duty_id',
        'leader_duty_id',
        'task_id',
        'deficiencies',
    ];

    public function followup_team_duty(){
        return $this->belongsTo(FollowupTeamDuty::class);
    }
    public function supervisors_duty(){
        return $this->belongsTo(SupervisorDuty::class);
    }
}
