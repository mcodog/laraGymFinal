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

        $coach->lname = $request->coachLname;
        $coach->fname = $request->coachFname;
        $coach->addressline = $request->coachAddressline;

        $coach->zipcode = $request->coachZipcode;
        $coach->phone = $request->coachPhone;
        $coach->age = $request->coachAge;
        $coach->gender = $request->coachGender;

        if(request()->has('coachImage_upload')){
            $files = $request->file('coachImage_upload');
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
        $coach = Coach::find($id);

        $coach->lname = $request->coachLname2;
        $coach->fname = $request->coachFname2;
        $coach->addressline = $request->coachAddressline2;
        $coach->zipcode = $request->coachZipcode2;
        $coach->phone = $request->coachPhone2;
        $coach->age = $request->coachAge2;
        $coach->gender = $request->coachGender2;


        if($coach->image_path == null) {
            if(request()->has('coachImage_upload2')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $coach->image_path = request()->file('coachImage_upload2')->store('images', 'public');
            }
        } else {
            if(request()->has('coachImage_upload2')){
                $image_path = $coach->image_path;
                Storage::delete('public/'.$image_path);
                $coach->image_path = request()->file('coachImage_upload2')->store('images', 'public');
            }
        }

        $coach->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $coach->save();
 

        return response()->json([
            "success" => "coach update successfully.",
            "coach" => $coach,
            "status" => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();
		$data = array('success' => 'coach','code'=>200);
        return response()->json($data);
    }
}
