<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorTask extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'week_id',
        'advisor_id',
        'supervisor_id',
        'thursday_task',
        'final_mark_confirm',
        'final_mark_screenshot',
        'supervisor_reading',
        'no_of_pages',
        'points',
        'extra_points'
    ];
}
