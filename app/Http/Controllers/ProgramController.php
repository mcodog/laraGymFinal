<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Coach;
use Storage;
use Carbon\Carbon;

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
}
