<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupTeamDuty extends Model
{
    use HasFactory;
    protected $fillable = [
        'week_id',
        'leader_id',
        'supervisor_id',
        'user_id',
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
        'withdrawn_ambassadors_No',
        'leader_reading',
        'about_leader',
        'points',
        'extra_points',
    ];
}
