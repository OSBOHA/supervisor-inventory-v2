<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;
    protected $fillable = [
        'supervisor_id',
        'advisor_id',
        'team',
        'name',
        'type',
    ];
    public function supervisor(){
        return $this->belongsTo(Supervisor::class,'supervisor_id');
    }
    public function advisor(){
        return $this->belongsTo(Advisor::class,'advisor_id');
    }
    public function followup_team_duties()
    {
        return $this->hasMany(FollowupTeamDuty::class);
    }
    public function repeated_note()
    {
        return $this->hasOne(RepeatedNote::class);
    }
}
