<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use Storage;
use Carbon\Carbon;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coach::orderBy('id', 'DESC')->get();
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
        $coach = new Coach();

        $coach->lname = $request->lname;
        $coach->fname = $request->fname;
        $coach->addressline = $request->addressline;

        $coach->zipcode = $request->zipcode;
        $coach->phone = $request->phone;
        $coach->age = $request->age;
        $coach->gender = $request->gender;

        if(request()->has('image_upload')){
            $files = $request->file('image_upload');
            $coach->image_path = 'images/' . $files->getClientOriginalName();
        }

        $coach->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $coach->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $coach->save();
        $data = ['status' => 'saved'];
        Storage::put(
            'public/images/' . $files->getClientOriginalName(),
            file_get_contents($files)
        );

        return response()->json([
            "success" => "coach created successfully.",
            "coach" => $coach,
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coach = Coach::where('id', $id)->first();
        return response()->json($coach);
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
