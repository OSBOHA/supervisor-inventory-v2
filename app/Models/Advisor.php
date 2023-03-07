<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    public function supervisors()
    {
        return $this->hasMany(Supervisor::class);
    }
    public function leaders()
    {
        return $this->hasMany(Leader::class);
    }
    public function supervisors_duties()
    {
        return $this->hasMany(SupervisorDuty::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
