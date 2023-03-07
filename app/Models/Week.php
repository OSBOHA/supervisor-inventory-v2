<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    public function followup_team_duties()
    {
        return $this->hasMany(FollowupTeamDuty::class);
    }
    public function supervisors_duties()
    {
        return $this->hasMany(SupervisorDuty::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function repeated_notes()
    {
        return $this->hasMany(RepeatedNote::class);
    }

}
