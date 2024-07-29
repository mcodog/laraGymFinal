<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create(); // Create a new Faker instance

        // Retrieve existing user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        $data = [];

        // Generate 100 records
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'user_id'     => $faker->randomElement($userIds), // Randomly pick a user ID
                'fname'       => $faker->firstName,
                'lname'       => $faker->lastName,
                'addressline' => $faker->address,
                'phone'       => $faker->phoneNumber,
                'zipcode'     => $faker->postcode,
                'age'         => $faker->numberBetween(18, 80), // Age between 18 and 80
                'gender'      => $faker->randomElement(['male', 'female']), // Randomly pick 'male' or 'female'
            ];
        }

        // Insert all records into the database
        DB::table('client')->insert($data);
    }
}
