<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;

class APSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all account IDs and program IDs
        $accountIds = DB::table('account')->pluck('id')->toArray();
        $programIds = DB::table('program')->pluck('id')->toArray();

        // Number of records to seed
        $recordsToSeed = 10;

        // Insert data
        foreach (range(1, $recordsToSeed) as $index) {
            DB::table('account_programs')->insert([
                'account_id' => $accountIds[array_rand($accountIds)],
                'program_id' => $programIds[array_rand($programIds)],
                'start_date' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                'end_date' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'),
                'duration' => rand(1, 100) . ' days',
                'cost' => rand(100, 1000),
                'status' => ['active', 'inactive'][rand(0, 1)],
            ]);
        }
    }
}
