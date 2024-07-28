<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Coach;
use App\Models\Client;
use App\Models\Membership;
use App\Models\Account_Programs;
use App\Models\Account;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Spatie\Searchable\Search;
 


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::orderBy('id', 'DESC')->get();

        foreach ($programs as $program) {
            $coach_id = $program->coach_id;
            $coach = Coach::find($coach_id);
            $program->coach = $coach; 
        }

        return response()->json($programs);
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
        
        $program = new Program();
        $program->coach_id = $request->coach;
        $program->title = $request->title;
        $program->description = $request->description;

        $program->duration = $request->duration;

        $program->cost = $request->cost;
        $program->difficulty = $request->difficulty;
        $selectedDays = $request->input('days', []);

        // Initialize schedule array
        $schedule = [
            'monday' => false,
            'tuesday' => false,
            'wednesday' => false,
            'thursday' => false,
            'friday' => false,
            'saturday' => false,
            'sunday' => false
        ];

        // Update schedule based on selected days
        foreach ($selectedDays as $day) {
            $dayWithoutNumber = preg_replace('/[0-9]/', '', $day);
            $lowercaseDay = strtolower($day); // Convert day to lowercase
            if (array_key_exists($lowercaseDay, $schedule)) {
                $schedule[$lowercaseDay] = true;
            }
        }

        // Create comma-separated string of selected days
        $selectedDaysString = implode(', ', array_keys(array_filter($schedule)));

        // Assuming $program is your model instance

        $program->schedule = $selectedDaysString;


        $program->save();
        $data = ['status' => 'saved'];

        return response()->json([
            "success" => "program created successfully.",
            "program" => $program,
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::where('id', $id)->first();
        return response()->json($program);
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
        $program = Program::find($id);
        $program->coach_id = $request->coach2;
        $program->title = $request->title2;
        $program->description = $request->description2;

        $program->duration = $request->duration2;

        $program->cost = $request->cost2;
        $program->difficulty = $request->difficulty2;
        $selectedDays = $request->input('days', []);

        // Initialize schedule array
        $schedule = [
            'monday' => false,
            'tuesday' => false,
            'wednesday' => false,
            'thursday' => false,
            'friday' => false,
            'saturday' => false,
            'sunday' => false
        ];

        // Update schedule based on selected days
        foreach ($selectedDays as $day) {
            $dayWithoutNumber = preg_replace('/[0-9]/', '', $day);
            $lowercaseDay = strtolower($day); // Convert day to lowercase
            if (array_key_exists($lowercaseDay, $schedule)) {
                $schedule[$lowercaseDay] = true;
            }
        }

        // Create comma-separated string of selected days
        $selectedDaysString = implode(', ', array_keys(array_filter($schedule)));

        // Assuming $program is your model instance

        $program->schedule = $selectedDaysString;


        $program->save();
        $data = ['status' => 'saved'];

        return response()->json([
            "success" => "program updated successfully.",
            "program" => $program,
            "status" => 200
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
		$data = array('success' => 'deleted','code'=>200);
        return response()->json($data);
    }

    public function search($query) {
        $programs=Program::search($query)->get();
        return response()->json($programs);
    }

    public function showDetails(string $id) {
        $authId = Auth::user()->id;
        $account = Account::where('client_id', $authId)->first();
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

        $client = Client::where('id', $authId)->first();
        $membership = Membership::where('id', $account->membership_id)->first();

        $program = Program::where('id', $id)->first();
        return view('program.index', compact('program', 'account', 'activePrograms', 'matchedPrograms', 'client', 'membership'));
    }

    public function searchAlgolia(string $query) {
        $programs=Program::search($query)->get();
        return view('programs2', compact('programs'));
    }

    public function searchSpatie(string $query)
    {

        $programs = (new Search())
        ->registerModel(Program::class, 'title')
        ->search('yoga');
        
        // Total results count
        $programs->count();
        dd($programs);
        
    }
}
