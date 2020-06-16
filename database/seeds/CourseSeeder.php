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
            'name' => 'Smart-X', 
            'instructor_id' => 2, 
            'age' => 6, 
            'duration' => 6,
            'capacity' => 23,
            'description' => 'Our robotics for kids classes begin here. This is the perfect'.
                ' age for your kid to start learning the basics of robotics. '.
                'By anchoring learning of the digital fundamentals with a pedagogy '.
                'that fosters curiosity and initiative, your children will inevitably '.
                'develop the love for learning all things digital. Consequently, navigating'.
                ' through technology and the digital world will be as natural as breathing '.
                'for your children. Think about it!
                Robots have and are increasingly replacing humans,'.
                ' not only on repetitive tasks but also many aspects'.
                ' of accounting, legal, marketing, banking operations and trading,'.
                ' research analyst and even surgeons and radiologist jobs.'.
                ' And the pace of change will only accelerate. Therefore, why not'.
                ' give your kids the edge by exposing them early to the digital world'.
                ' and help them develop the 21st century skills to thrive in the volatile and uncertain future.',
        ]);

        Course::create([
            'name' => 'Robo-Builders', 
            'instructor_id' => 1, 
            'age' => 8, 
            'duration' => 3,
            'capacity' => 30,
            'description' => "This course aims to develop the skills on engineering design application.".
            " By building on fundamentals learnt in level 1 and applying logical thinking, they will learn ".
            "how to make robots come alive through programming and story-telling.".
            "By building on the basics they learn in level 1, you will be amazed as to how".
            " your kids will progress to kids’ programming, and learn to adapt through play and ".
            "teamwork. Children learn best through play. It builds their curiosity and confidence.".
            " See your kids develop growth mindsets through our coding classes for kids as they hone their ".
            "digital and life-skills in a fun, immersive and engaging environment that prepares them for the".
            " Future of Work.",
        ]);

        Course::create([
            'name' => 'Rise of the Robo-Arms', 
            'instructor_id' => 1, 
            'age' => 10, 
            'duration' => 4,
            'capacity' => 20,
            'description' => 'This unit will help students to explore and develop better understanding".
            " of how sensors, code, electro-mechanical circuits, and programming all come together to ".
            "create robotic movements with LEGO Mindstorms. They will also learn more about programming ".
            "animation and story-telling with Scratch.".
            "
            At this level, things get really exciting, really fast! Designed to challenge kids on critical ".
            "thinking for creative problem-solving in a team-based learning approach that fosters ".
            "communication and collaboration skills. The program seeks to develop the leadership potential".
            " of your kids in many aspects: story-telling to foster communication and creativity and animation".
            " programming to enhance digital skills.',
        ]);

        Course::create([
            'name' => 'Robotics with Your Own Sphero RVR', 
            'instructor_id' => 2, 
            'age' => 12, 
            'duration' => 12,
            'capacity' => 30,
            'description' => "Ignite your ingenuity with the Sphero RVR, a revolutionary".
            " autonomous robot packed with a wide range of features to spark your inner maker. ".
            "Robotics beginners and experts alike will love working with the RVR, with it's complete".
            " suite of sensors and professional-level control system that handles the basics so you can ".
            "focus on bigger challenges. Explore the world of robotics and create the one-of-a-kind 'bot of".
            " your dreams.",
        ]);
        Course::create([
            'name' => 'Home Autonomous Arduino Robot and Sensor Kit', 
            'instructor_id' => 4, 
            'age' => 15, 
            'duration' => 9,
            'capacity' => 10,
            'description' => "Get hands-on and build your very own take-home, autonomous robot.".
            " Using basic circuitry and frame components, construct a base for your robot, attach".
            " an Arduino, and bring it to life with your code. An Arduino is a popular microcontroller, ".
            "perfect for prototyping, allowing you to create new electronic devices and integrate ".
            "sensors for your robot to understand and navigate its environment. Acquire the college-level".
            " STEM principles of hands-on mechanics, critical thinking, and collaboration—vital skills for ".
            "any future in robotics. You can’t get this iD Tech original robot anywhere else!",
        ]);
    }
}
