<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Account_Programs;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function retrievePrograms($id) {

        $data = Program::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    public function saveProgram(Request $request) {

            $accountProgram = Account::where('id', $request->accountIdInp)->first();
            
            if($accountProgram->free_session > 0) {
                $cost = 0;
                $accountProgram->free_session = ($accountProgram->free_session - 1);
                $accountProgram->save();
            } else {
                $cost = $request->costInp;
            }

            $programs = Program::where('id', $request->membershipIdInp)->first();
            

            $account_details = Account_Programs::where('account_id', $request->accountIdInp)->get();
            $particularDays = explode(', ', $programs->schedule);
            $matchFound = false;

           

            foreach ($account_details as $accounts) {
                $programs2 = Program::where('id', $accounts->program_id)->first();
                $daysArray = explode(', ', $programs2->schedule);

                foreach ($daysArray as $day) {
                    if (in_array(strtolower($day), array_map('strtolower', $particularDays))) {
                        $matchFound = true;

                        break;
                    }
                }
            }

            if ($matchFound == true) {
                return response()->json([
                    "success" => "application created successfully.",
                    "program" => 'no',
                    "status" => 200
                ]);
            } else {
                $program = new Account_Programs();
                $program->account_id = $request->accountIdInp;
                $program->program_id = $request->membershipIdInp;
                $program->start_date = $request->startDateInp;
                $program->end_date = $request->endDateInp;
                $program->duration = $request->durationInp;
                $program->cost = $cost;
                $program->status = "Active";

                $program->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $program->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $program->save();


                $data = ['status' => 'saved'];
                return response()->json([
                    "success" => "application created successfully.",
                    "program" => $program,
                    "status" => 200
                ]);
               
            }
    }

    public function salesChart() {
        // Initialize an array to store results
        $monthlyData = [];

        // Loop through each month (1 to 12)
        for ($month = 1; $month <= 12; $month++) {
            // Fetch sum of total_cost for the current month
            $totalCost = DB::table('account')
                            ->whereMonth('created_at', $month)
                            ->sum('total_cost');

            // Calculate timestamp for the first day of the month
            $timestamp = mktime(0, 0, 0, $month, 1);

            // Format data as required
            $monthlyData[] = [
                'date' => $timestamp * 1000, // Multiply by 1000 to convert to milliseconds
                'units' => $totalCost,
            ];
        }

        // Return data as JSON response
        return response()->json($monthlyData);
    }

    public function countApplicant() {
        // Retrieve all programs with their counts from account_programs table
        $programs = Program::withCount('accountPrograms')->get();

        // Format data as required
        $output = [];
        $total = 0;
        foreach ($programs as $program) {
            $total = $total +$program->account_programs_count;
        }

        foreach ($programs as $program) {
            $output[] = [
                'indexLabel' => $program->title, // Assuming program name is stored in 'name' column
                'y' => $program->account_programs_count,
                'label' => (($program->account_programs_count/$total)*100) . "%",
            ];
        }

        // Return data as JSON response
        return response()->json($output);
    }

    public function getMemberships() {
        // Execute the SQL query using Laravel's query builder
        $memberships = DB::table('membership AS m')
            ->select('m.title', DB::raw('COUNT(a.membership_id) AS count'))
            ->leftJoin('account AS a', 'm.id', '=', 'a.membership_id')
            ->groupBy('m.title')
            ->get();

        // Format the result as JSON
        $result = [];
        foreach ($memberships as $membership) {
            $result[] = [
                'label' => $membership->title,
                'y' => $membership->count,
            ];
        }

        return response()->json($result);
    }
    
}
