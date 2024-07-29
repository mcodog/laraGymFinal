<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create(); // Create a new Faker instance

        $data = [];

        // Generate 100 records
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make($faker->password),
                'role'     => $faker->boolean ? 1 : 0, // Randomly assign 0 or 1
                'status'   => $faker->boolean ? 1 : 0, // Randomly assign 0 or 1
            ];
        }

        // Insert all records into the database
        DB::table('users')->insert($data);
    }

}
