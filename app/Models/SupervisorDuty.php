<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorDuty extends Model
{
    use HasFactory;
    protected $fillable = [
        'supervisor_id' ,
        'advisor_id',
        'week_id',
        'thursday_task',
        'team_final_mark',
        'final_mark_post' ,
        'supervisor_reading' ,
    ];
}
