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
        DB::beginTransaction();

        try {
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
                    if (in_array(strtolower($day), $particularDays)) {
                        $matchFound = true;
                        break;
                    }
                }
            }

            if ($matchFound == true) {

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

                DB::commit(); // Commit the transaction if everything is successful

                $data = ['status' => 'saved'];

                return response()->json([
                    "success" => "application created successfully.",
                    "program" => $program,
                    "status" => 200
                ]);
            }
            
        } catch (\Exception $e) {
            DB::rollBack(); 

            return response()->json([
                "error" => "Failed to create application.",
                "message" => $e->getMessage(),
                "status" => 500
            ]);
        }
    }
}
