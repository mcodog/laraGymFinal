<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Membership;
use App\Models\Account_Programs;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use View;



class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function display($id) {
        $account = Account::where('client_id', $id)->first();
        // dd($artist->name, $artist->country);
        // Check if account is found
        if ($account) {
            // Retrieve active programs associated with the account
            $activePrograms = Account_Programs::where('account_id', $account->id)->get();
    
            // If there are active programs, fetch related programs from Programs table
            if ($activePrograms->isNotEmpty()) {
                // Collect program IDs from $activePrograms
                $programIds = $activePrograms->pluck('program_id')->toArray();
    
                // Retrieve programs from Programs table where IDs match $programIds
                $matchedPrograms = Program::whereIn('id', $programIds)->get();
            } else {
                $matchedPrograms = collect(); // Empty collection if no active programs found
            }
        } else {
            // Handle case where no account with client_id = $id is found
            $activePrograms = collect(); // Empty collection
            $matchedPrograms = collect(); // Empty collection
        }
    
        // Pass data to the view and return it
        return view('client.profile', compact('account', 'activePrograms', 'matchedPrograms'));
}
        

    public function index()
    {
        $data = Account::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account = new Account();
        $id = Auth::user()->id;
        
        $account->client_id	 = $id;
        $account->membership_id = $request->membershipTypes;
        $account->total_cost = $request->totalCost;
        $account->duration = $request->membershipMonths;
        $account->free_session = 3;
        $account->status = "Active";

        $account->start_date = Carbon::now();
        $account->end_date = $request->endDate;

        $account->save();
        
        $data = ['status' => 'saved'];

        return response()->json([
            "success" => "account created successfully.",
            "account" => $account,
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
