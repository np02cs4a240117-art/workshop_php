<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create(['code' => '6CS056', 'name' => 'Web Technologies']);
        Course::create(['code' => '6CS028', 'name' => 'Advanced Topics in CS']);
        Course::create(['code' => '6CS030', 'name' => 'Big Data Analysis']);
    }
}
