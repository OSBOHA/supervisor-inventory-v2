<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'team',
        'current_advisor',
        'previous_advisor',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function advisor(){
        return $this->belongsTo(Advisor::class,'advisor_id');
    }

    public function leaders()
    {
        return $this->hasMany(Leader::class);
    }

    public function supervisors_duties()
    {
        return $this->hasMany(SupervisorDuty::class);
    }
    
    public function followup_team_duties()
    {
        return $this->hasMany(FollowupTeamDuty::class);
    }


}
