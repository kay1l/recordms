<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CollegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colleges')->insert([
            [
                'collegeCode' => '101',
                'status' => 'Active',
                'collegeName' => 'College of Technology and Engineering'
                
            ],
            [
                'collegeCode' => '202',
                'status' => 'Active',
                'collegeName' => 'College of Teacher Education'
                
            ],
            [
                'collegeCode' => '303',
                'status' => 'Active',
                'collegeName' => 'College of Arts and Sciences'
                
            ],
            [
                'collegeCode' => '404',
                'status' => 'Active',
                'collegeName' => 'College of Maritime Education '
                
            ],
            [
                'collegeCode' => '505',
                'status' => 'Active',
                'collegeName' => 'College of Graduate Studies'
                
            ],
        ]);
        
    }
}
