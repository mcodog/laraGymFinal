<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoachSeeder extends Seeder
{
    public function run()
    {
        // Arrays for names, addresses, and genders
        $firstNames = ['Walter', 'Jesse', 'Saul', 'Mike', 'Gus', 'Hank', 'Skyler', 'Kim', 'Chuck', 'Jimmy', 'Jane', 'Anna', 'Paul', 'Ryan', 'Laura', 'Olivia', 'Ethan', 'Liam', 'Mia', 'Sophia', 'Ava', 'Isabella', 'Charlotte', 'Amelia', 'Harper'];
        $lastNames = ['White', 'Pinkman', 'Goodman', 'Ehrmantraut', 'Fring', 'Schrader', 'White', 'Wexler', 'McGill', 'Goodman', 'Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'Martin'];
        $addresses = [
            '1600 Amphitheatre Parkway, Mountain View, CA 94043',
            '1 Infinite Loop, Cupertino, CA 95014',
            '350 Fifth Avenue, New York, NY 10118',
            '1601 Willow Road, Menlo Park, CA 94025',
            '12 Wall Street, New York, NY 10005',
            '2 Microsoft Way, Redmond, WA 98052',
            '1000 5th Avenue, New York, NY 10028',
            '29 W 35th St, New York, NY 10001',
            '2000 Avenue of the Stars, Los Angeles, CA 90067',
            '456 Market St, San Francisco, CA 94105',
            '123 Main St, Boston, MA 02110',
            '456 Elm St, Chicago, IL 60614',
            '789 Oak St, Seattle, WA 98101',
            '101 Pine St, San Diego, CA 92101',
            '202 Maple St, Austin, TX 73301'
        ];
        $genders = ['Male', 'Female'];

        // Seed data
        $coaches = [];
        $numOfCoaches = 50;

        for ($i = 0; $i < $numOfCoaches; $i++) {
            $fname = $firstNames[array_rand($firstNames)];
            $lname = $lastNames[array_rand($lastNames)];
            $addressline = $addresses[array_rand($addresses)];
            $phone = '555-' . rand(1000, 9999);
            $zipcode = rand(10000, 99999);
            $age = rand(25, 65);
            $gender = $genders[array_rand($genders)];

            // Generate image path with incrementing number
            $image_number = $i + 1; // Start from 1, not 0
            $image_path = 'images/man' . $image_number . '.jpg';

            $created_at = $updated_at = Carbon::now()->subDays(rand(1, 30))->format('Y-m-d H:i:s');

            $coaches[] = [
                'fname' => $fname,
                'lname' => $lname,
                'addressline' => $addressline,
                'phone' => $phone,
                'zipcode' => $zipcode,
                'age' => $age,
                'gender' => $gender,
                'image_path' => $image_path,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ];
        }

        // Insert data into the database
        DB::table('coach')->insert($coaches);
    }
}
