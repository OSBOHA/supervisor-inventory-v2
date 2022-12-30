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
        return $this->hasone(Supervisor::class,'supervisor_id');
    }
    public function advisor(){
        return $this->hasone(Advisor::class,'advisor_id');
    }
}
