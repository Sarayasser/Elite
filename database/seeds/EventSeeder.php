<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'First Lego League Junior', 
                    'description' => "First Lego League Jr. is designed to introduce STEM concepts".
                    " to kids ages 6 to 10 while exciting them through a brand they know and love ".
                    "− LEGO®. Guided by adult coaches, teams up to 6 members, explore a real-world".
                    " scientific problem such as food safety, recycling or energy. Then, they create a".
                    " Show Me poster that illustrates their journey of discovery and introduces their team.".
                    " They also construct a motorized model of what they learned using LEGO elements."."

                    In the process, teams learn about teamwork, the wonders of science and technology,".
                    " and the FIRST Core Values, which include respect, sharing, and critical thinking. ".
                    "At the close of each season, teams come together at Expos to strut their stuff, ".
                    "share ideas, celebrate, and have fun.",
            'location' => "Masr Al-Qadima, Cairo, محافظة القاهرة, Egypt", 
            'date' => "2020-10-31", 
            'user_id' => 2,
        ]);
        
        Event::create([
            'name' => 'FIRST Tech Challenge (FTC)', 
                    'description' => "FTC is designed for high school students ages 14-18 years to".
                    " compete head to head using a sports model. Teams are responsible for designing,".
                    " building, and programming their robots to compete in an alliance format. The robot ".
                    "kit is reusable from year-to-year and is programmed using a variety of languages.".
                    "

                    Teams, including coaches, mentors, and volunteers are required to develop strategy ".
                    "and build robots based on sound engineering principles. Awards are given for the ".
                    "competition as well as for community outreach, design, and other real-world accomplishments.",
            'location' => "Thakanat El-Maadi, Cairo, محافظة القاهرة, Egypt", 
            'date' => "2020-10-16", 
            'user_id' => 5,
        ]);


        Event::create([
            'name' => 'FIRST LEGO League (FLL)', 
            'description' => "FIRST LEGO League (FLL®) is a competition catering for ".
                    " upper-primary and lower-secondary school students ages: 9-16 years. Every year,".
                    " teams of up to 10 students build, program and compete with a robot, while learning".
                    " about a modern problem in science and engineering and developing solutions for it.".
                    "

                    The entire competition for the year is based around one of these themes: natural ".
                    "disasters, senior citizens, food health & safety, climate change, medical science,".
                    " and nanotechnology. Tournaments are run with the feel of a sporting event, and teams ".
                    "compete like crazy while having the time of their lives. What FLL teams accomplish is nothing short of amazing.",
            'location' => "Moharam Bek, Alexandria, الإسكندرية, Egypt", 
            'date' => "2020-08-19", 
            'user_id' => 3,
        ]);

        Event::create([
            'name' => 'RoboCupJunior Egypt', 
            'description' => "RoboCup was founded in 1997 with the main goal ".
                    "of “developing by 2050 a Robot Soccer team capable of winning against the ".
                    "human team champion of the FIFA World Cup”. In the next years, RoboCup".
                    " proposed several soccer platforms that have been established as standard ".
                    "platforms for robotics research.
                    RoboCupJunior is a project-oriented educational initiative that supports ".
                    "local, regional and international robotic events for young students ages: 9-20 years.".
                    " It is designed to introduce RoboCup to primary and secondary school children, ".
                    "as well as undergraduates who do not have the resources to get involved in the senior leagues.",
            'location' => "Cairo Tower, Giza, محافظة الجيزة‎, Egypt", 
            'date' => "2020-06-30", 
            'user_id' => 2,
        ]);

        Event::create([
            'name' => 'ROV Competition', 
            'description' => 'ROV Competition is made to build new generations of Arab Rovers to let university'.
                ' and school students ages 10-20 years compete in designing and building ROV "underwater robot" to'.
                ' achieve mission underwater, which is a simulation to a real mission.

                ROV Egypt Regional Competition was launched for the first time in Egypt in 2011 in cooperation with'.
                ' MATE Center and organized by Hadath for Innovation and Entrepreneurship. The winners are qualified to'.
                ' participate in MATE International ROV Competition.'.'
                
                This competition helps the kids design a robot through a kit which includes the robot components'.
                ' and using it in the competition, the kids are divided into teams with the same age and compete with each other on the scale of the Arab world. ',
            'location' => "Sidi Gaber, Alexandria, الإسكندرية, Egypt", 
            'date' => "2020-06-19", 
            'user_id' => 5,
        ]);
    }
}
