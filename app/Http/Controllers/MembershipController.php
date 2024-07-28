<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use Storage;
use Carbon\Carbon;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Membership::orderBy('id', 'DESC')->get();
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
        $membership = new Membership();
        $membership->title = $request->memTitle;
        $membership->description = $request->memDescription;

        $membership->duration = $request->memDuration;

        $membership->cost = $request->cost;
        $membership->allow_visitors = $request->visitors;
        $membership->perks = "";
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



        $membership->save();
        $data = ['status' => 'saved'];

        return response()->json([
            "success" => "membership created successfully.",
            "membership" => $membership,
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $membership = Membership::where('id', $id)->first();
        return response()->json($membership);
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
        $membership = Membership::find($id);
        $membership->title = $request->memTitle2;
        $membership->description = $request->memDescription2;

        $membership->duration = $request->memDuration2;

        $membership->cost = $request->cost3;
        // $membership->allow_visitors = $request->visitor2;
        if ($request->visitor3 === 0 || $request->visitor3 == 'False') {
            $membership->allow_visitors = 0;
        } elseif ($request->visitor3 === 1 || $request->visitor3 == 'True') {
            $membership->allow_visitors = 1;
        }
        $membership->perks = "";
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



        $membership->save();
        $data = ['status' => 'saved'];

        return response()->json([
            "success" => "membership updated successfully.",
            "membership" => $membership,
            "status" => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();
		$data = array('success' => 'deleted','code'=>200);
        return response()->json($data);
    }
}
