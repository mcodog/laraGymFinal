<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
     public function run()
     {
         $this->call(CoachSeeder::class);
         $this->call(MembershipSeeder::class);
     
         $titles = [
             'Yoga Basics', 'Advanced Pilates', 'HIIT Training', 'CrossFit', 'Zumba',
             'Bodybuilding', 'Cardio Blast', 'Strength Training', 'Kettlebell Workouts',
             'Spin Classes', 'Functional Fitness', 'Bootcamp', 'Circuit Training',
             'Boxing', 'Martial Arts', 'Aerobics', 'Core Strength', 'Stretching',
             'Swimming', 'Rowing', 'Resistance Band Training'
         ];
         $durations = ['1 month', '2 months', '3 months', '4 months', '5 months', '6 months', '7 months', '8 months', '9 months', '10 months', '11 months', '12 months'];
         $difficulties = ['Easy', 'Intermediate', 'Hard'];
         $schedules = [
             'Monday, Tuesday, Wednesday, Saturday',
             'Saturday, Sunday',
             'Wednesday, Thursday, Sunday',
             'Monday, Wednesday, Friday',
             'Tuesday, Thursday, Saturday',
             'Monday, Thursday',
             'Tuesday, Friday, Sunday',
             'Wednesday, Friday',
             'Monday, Tuesday, Thursday, Saturday',
             'Friday, Saturday, Sunday'
         ];
     
         $faker = Faker::create();
     
         $coach_ids = DB::table('coach')->pluck('id')->toArray();
     
         $programs = [];
         $numOfPrograms = 100;
     
         for ($i = 0; $i < $numOfPrograms; $i++) {
             $coach_id = $faker->randomElement($coach_ids);
             $title = $faker->randomElement($titles);
             $description = $faker->sentence($nbWords = 10, $variableNbWords = true);
             $duration = $faker->randomElement($durations);
             $cost = $faker->numberBetween(50, 500);
             $difficulty = $faker->randomElement($difficulties);
             $schedule = $faker->randomElement($schedules);
             $image = 'default-program' . $faker->numberBetween(1, 5) . '.jpg'; // Generate image name
     
             $programs[] = [
                 'coach_id' => $coach_id,
                 'title' => $title,
                 'description' => $description,
                 'duration' => $duration,
                 'cost' => $cost,
                 'difficulty' => $difficulty,
                 'schedule' => $schedule,
                 'image' => $image, // Add image column
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
             ];
         }
     
         DB::table('program')->insert($programs);
     }
}
