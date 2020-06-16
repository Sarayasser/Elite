<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Instructor;
use App\InstructorExperience;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'mariam', 
            'email' => 'mariam@gmail.com',
            'password' => bcrypt('12345678'), 
            'address' => 'Garden City Samouha, Alexandria, الإسكندرية, Egypt',
            'phone_number' => '01207622330',
            'gender' => 1,
            // 'image' => 'images/team/team5.jpg',
            
        ]);
        $user->assignRole('instructor');
        $user->markEmailAsVerified();

        $instructor = Instructor::create([
            'user_id' => $user->id,
            'title' => "Computer Engineer",
            'year_of_experience' => "1 year",
            'facebook' => "https://www.facebook.com/",
            'github' => "https://github.com/",
            'twitter'=> "https://twitter.com/",
            'instagram' => "https://www.instagram.com/",
            'bio' => "I help designers, small agencies and businesses bring their ideas to life. Powered by Figma, VS Code and coffee, I turn your requirements into "
        ]);

        InstructorExperience::create([
            'instructor_id' => $instructor->id,
            'experience' => "Computer Science (BSc)"

        ]);
        InstructorExperience::create([
            'instructor_id' => $instructor->id,
            'experience' => "English and Creative Writing (BA)"

        ]);

        $user = User::create([
            'name' => 'farid ali', 
            'email' => 'farid@gmail.com',
            'password' => bcrypt('12345678'), 
            'address' => 'Alexandria Street, Cairo, محافظة القاهرة, Egypt',
            'phone_number' => '01205322328',
            'gender' => 0,
            // 'image' => 'images/default_avatar.jpg',
            
        ]);
        $user->assignRole('instructor');
        $user->markEmailAsVerified();

        $instructor = Instructor::create([
            'user_id' => $user->id,
            'title' => "front-end developer",
            'year_of_experience' => "2 years",
            'facebook' => "https://www.facebook.com/",
            'github' => "https://github.com/",
            'twitter'=> "https://twitter.com/",
            'instagram' => "https://www.instagram.com/",
            'bio' => "My name is Farid Ali, web designer at iti. Self taught with over 2 years of experience, I bring a range of skills from visual design, interaction design, UX, to prototyping. I focus on creating rich seamless experiences between the product and the user. I'm always looking for creative people to vibe with, let's connect through my social channels below."
        ]);


        InstructorExperience::create([
            'instructor_id' => $instructor->id,
            'experience' => "English and Creative Writing (BA)"

        ]);

        $user = User::create([
            'name' => 'maged ibrahim', 
            'email' => 'MagedIbrahim@gmail.com',
            'password' => bcrypt('12345678'), 
            'address' => 'Naser El Alamin, Cairo, محافظة القاهرة, Egypt',
            'phone_number' => '01201042328',
            'gender' => 0,
            // 'image' => 'images/default_avatar.jpg',
            
        ]);
        $user->assignRole('instructor');
        $user->markEmailAsVerified();

        Instructor::create([
            'user_id' => $user->id,
            'title' => "Computer Engineer",
            'year_of_experience' => "More than 3 years",
            'facebook' => "https://www.facebook.com/",
            'github' => "https://github.com/",
            'twitter'=> "https://twitter.com/",
            'instagram' => "https://www.instagram.com/",
            'bio' => "Detail-oriented computer engineer with 5+ years of expertise working with embedded systems, artificial intelligence, machine learning, and automation technologies. Increased multiply-accumulate performance on proprietary DSP algorithms by 5% through system and chip analysis revamp. Seeking to leverage first-hand experience with driverless car technology and integrated systems to become the lead computer engineer at Alset Automotive Technologies."
        ]);

        $user = User::create([
            'name' => 'soha taher', 
            'email' => 'soha@gmail.com',
            'password' => bcrypt('12345678'), 
            'address' => 'Alexandria Street, Cairo, محافظة القاهرة, Egypt',
            'phone_number' => '01267822328',
            'gender' => 1,
            
        ]);
        $user->assignRole('instructor');
        $user->markEmailAsVerified();

        $instructor = Instructor::create([
            'user_id' => $user->id,
            'title' => "software engineer",
            'year_of_experience' => "3 years",
            'facebook' => "https://www.facebook.com/",
            'github' => "https://github.com/",
            'twitter'=> "https://twitter.com/",
            'instagram' => "https://www.instagram.com/",
            'bio' => "Experienced software engineer with a passion for developing innovative programs that expedite the efficiency and effectiveness of organizational success. Well-versed in technology and writing code to create systems that are reliable and user-friendly. Skilled leader who has the proven ability to motivate, educate, and manage a team of professionals to build software programs and effectively track changes. Confident communicator, strategic thinker, and innovative creator to develop software that is customized to meet a company’s organizational needs, highlight their core competencies, and further their success."
        ]);
        
        InstructorExperience::create([
            'instructor_id' => $instructor->id,
            'experience' => "Computer Science (BSc)"

        ]);
        InstructorExperience::create([
            'instructor_id' => $instructor->id,
            'experience' => "English and Creative Writing (BA)"

        ]);
       

        
    }
}
