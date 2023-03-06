<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Week;
use Illuminate\Support\Str;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $i=0;
       // while ($i <= 10) {
            Week::create([
                'advisor_timer' => Carbon::now()->addDays(3),
                'supervisor_timer' => Carbon::now()->addDays(6),
                'title' => 'week'.Str::random(6),
            ]);
           // $i++;
        //}
        
    }
}
