<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'), 
                'collegeCode' => '505',
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UnitHead',
                'email' => 'unithead@gmail.com',
                'password' => Hash::make('unithead123'), 
                'collegeCode' => '101',
                'role' => 'UnitHead',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Clerk',
                'email' => 'clerk@gmail.com',
                'password' => Hash::make('clerk123'), 
                'collegeCode' => '505',
                'role' => 'Clerk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
    

