<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use App\Models\Work;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(300)->create();
        $users = User::all()->shuffle();
        for($i = 0; $i < 20; $i++){
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }
        //Work::factory(100)->create();
        $employers = Employer::all();
        for($i = 0; $i < 100; $i++){
            Work::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach($users as $user){
            $jobs = Work::inRandomOrder()->take(rand(0, 4))->get();
            foreach ($jobs as $work){
                JobApplication::factory()->create([
                    'work_id' => $work->id, 
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
