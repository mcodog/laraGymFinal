<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
        ]);

        
        $faker = Faker::create(); // Create a new Faker instance

        // Retrieve existing client IDs and membership IDs
        $clientIds = DB::table('client')->pluck('id')->toArray();
        $membershipIds = DB::table('membership')->pluck('id')->toArray();

        $data = [];

        // Generate 100 records
        for ($i = 0; $i < 100; $i++) {
            $startDate = $faker->dateTimeBetween('-1 year', 'now');
            $endDate = $faker->dateTimeBetween('now', '+1 year');

            $data[] = [
                'client_id'     => $faker->randomElement($clientIds), // Randomly pick a client ID
                'membership_id' => $faker->randomElement($membershipIds), // Randomly pick a membership ID
                'total_cost'    => $faker->randomFloat(2, 10, 1000), // Random float value between 10 and 1000
                'duration'      => $faker->numberBetween(1, 12), // Random integer for duration (e.g., months)
                'start_date'    => $startDate->format('Y-m-d'), // Random start date
                'end_date'      => $endDate->format('Y-m-d'), // Random end date
                'free_session'  => $faker->numberBetween(0, 10), // Random integer for free sessions
                'status'        => $faker->randomElement(['active', 'inactive']), // Random status
            ];
        }

        // Insert all records into the database
        DB::table('account')->insert($data);

        $this->call([
            APSeeder::class,
        ]);
    }
}
