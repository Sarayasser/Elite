<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Admin', 
            'instructor_id' => 'admin@example.com', 
            'age' => bcrypt('password'), 
            'duration' => 1,
            'capacity' => 'Alexandria',
            'description' => '012686454686',
            'image' => 0
        ]);
    }
}
