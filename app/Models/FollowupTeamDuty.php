<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupTeamDuty extends Model
{
    use HasFactory;
    protected $fillable = [
        'leader_id',
        'week_id',
        'supervisor_id',
        'last_edit_by',
        'team_final_mark',
        'team_members',
        'follow_up_post',
        'about_asboha_post',
        'zero_mark',
        'frozen_ambassadors',
        'friday_task',
        'thursday_task',
        'leader_training',
        'discussion_post',
        'final_mark',
        'audit_final_mark',
        'withdrawn_ambassadors',
        'leader_reading',
        'about_leader',
        'points',
        'extra_points',  
        'withdrawn_ambassadors_No'
    ];

    public function leader(){
        return $this->belongTo(Leader::class,'leader_id');
    }

    public function week(){
        return $this->belongTo(Week::class,'leader_id');
    }
    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }
}
