<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Advisor;
use App\Models\Supervisor;
use App\Models\Leader;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class LeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = ['withdrawn','support','permanent'];
        $advisors = Advisor::pluck('id')->toArray();
        
            $i=0;
            while($i < 10) {
                Leader::create([
                    'advisor_id' => Arr::random($advisors),
                    'supervisor_id' => null,
                    'team' => Str::random(10),
                    'name' => Str::random(7),
                    'type' => Arr::random($type),
                ]);
                $i++;
            }
        
        $supervisors = Supervisor::select('id','current_advisor')->get();
        foreach ($supervisors as $supervisor) {
            $i=0;
            while($i < 1){ //rand(7,10) ){
                if($supervisor->current_advisor){
                    Leader::create([
                        'advisor_id' => $supervisor->current_advisor,
                        'supervisor_id' => $supervisor->id,
                        'team' => Str::random(10),
                        'name' => Str::random(7),
                        'type' => Arr::random($type),
                    ]);
                }
            $i++;}
        }

    }
}
