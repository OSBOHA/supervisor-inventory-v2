<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepeatedNote extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongTo(User::class);
    }

    public function week(){
        return $this->belongTo(Week::class);
    }
}
