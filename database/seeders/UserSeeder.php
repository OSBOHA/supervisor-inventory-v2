<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Advisor;
use App\Models\Supervisor;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('password123');
        //admin
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => $password,
        ]);
        $admin->assignRole('admin');

        $advisor = User::factory()->create([
            'name' => 'Advisor User',
            'email' => 'advisor@example.com',
            'password' => $password,
        ]);
        $advisor->assignRole('Advisor');
        Advisor::create(['user_id' => $advisor->id,
            'team' => Str::random(10)]);
        

        $supervisor = User::factory()->create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@example.com',
            'password' => $password,
        ]);
        $supervisor->assignRole('supervisor');
        Supervisor::create([
            'user_id' => $supervisor->id,
            'team' => Str::random(10),
            'current_advisor' => $advisor->id,
            'previous_advisor' => null,
        ]);
    
        //advisors
        $advisors = User::factory()->count(5)->create();

        foreach ($advisors as $advisor) {
            $advisor->assignRole('advisor');
            Advisor::create(['user_id' => $advisor->id,
            'team' => Str::random(10)]);
        }

        //supervisors
        $supervisors = User::factory()->count(50)->create();
        $advisors = Advisor::pluck('id')->toArray();
        array_push($advisors, null);
        foreach ($supervisors as $supervisor) {
            $supervisor->assignRole('supervisor');
            Supervisor::create([
                'user_id' => $supervisor->id,
                'team' => Str::random(10),
                'current_advisor' => Arr::random($advisors),
                'previous_advisor' => Arr::random($advisors),
            ]);
        }

    }
}
