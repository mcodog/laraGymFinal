<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use DB;


class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Arrays for the values
        $titles = [
            'Basic Plan', 'Standard Plan', 'Premium Plan', 'Family Plan', 'Student Plan',
            'Senior Plan', 'Couples Plan', 'Corporate Plan', 'Weekend Plan', 'Daily Pass'
        ];
        $durations = ['1 month', '3 months', '6 months', '12 months'];
        $perksOptions = [
            'Free Personal Training', 'Free Group Classes', 'Access to Pool', 'Free Towel Service',
            'Discounted Spa Services', 'Free Fitness Assessment', 'Priority Booking', 'Free Guest Pass',
            'Complimentary Drinks', 'Extended Gym Hours'
        ];

        // Faker instance
        $faker = Faker::create();

        // Seed data
        $plans = [];
        $numOfPlans = 100;

        for ($i = 0; $i < $numOfPlans; $i++) {
            $title = $faker->randomElement($titles);
            $description = $faker->sentence($nbWords = 10, $variableNbWords = true);
            $duration = $faker->randomElement($durations);
            $allow_visitors = $faker->boolean; // Boolean value
            $cost = $faker->randomFloat(2, 10, 500); // Cost between 10.00 and 500.00
            $perks = implode(', ', $faker->randomElements($perksOptions, $faker->numberBetween(1, 5)));

            $plans[] = [
                'title' => $title,
                'description' => $description,
                'duration' => $duration,
                'allow_visitors' => $allow_visitors,
                'cost' => $cost,
                'perks' => $perks,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }

        // Insert data into the database
        DB::table('membership')->insert($plans);
    }
}
