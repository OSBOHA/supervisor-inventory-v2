<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorDuty extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'week_id',
        'advisor_id',
        'supervisor_id',
        'leader_members',
        'team_final_mark',
        'follow_up_post',
        'mark_problems_post',
        'returning_ambassadors_post',
        'new_ambassadors_post',
        'withdrawn_ambassadors_post',
        'leader_training',
        'discussion_post',
        'points',
        'extra_points'
    ];

    public function advisor(){
        return $this->belongTo(Advisor::class,'leader_id');
    }

    public function week(){
        return $this->belongTo(Week::class,'leader_id');
    }
    public function supervisor(){
        return $this->belongsTo(Supervisor::class,'supervisor_id');
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
