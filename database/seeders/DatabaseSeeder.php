<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        \App\Models\User::factory(10)->create();
        
        $this->call(CollegeTableSeeder::class);
        
        $this->call(ProgramTableSeeder::class);
        \App\Models\Program::factory(5)->create();
        
       $this->call(ActivityTableSeeder::class);
       \App\Models\Activity::factory(5)->create();

      

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
