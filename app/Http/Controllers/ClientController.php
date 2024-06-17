<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Storage;
use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Client::orderBy('id', 'DESC')->get();
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
        $user = new User([
            'name' => $request->fname . ' ' . $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
        $client = new Client();
        $client->id = $user->id;

        $client->lname = $request->lname;
        $client->fname = $request->fname;
        $client->addressline = $request->addressline;

        $client->zipcode = $request->zipcode;
        $client->phone = $request->phone;
        $client->age = $request->age;
        $client->gender = $request->gender;

        if(request()->has('image_upload')){
            $files = $request->file('image_upload');
            $client->image_path = 'images/' . $files->getClientOriginalName();
        }

        $client->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $client->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $client->save();
        $data = ['status' => 'saved'];
        Storage::put(
            'public/images/' . $files->getClientOriginalName(),
            file_get_contents($files)
        );

        return response()->json([
            "success" => "customer created successfully.",
            "client" => $client,
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::with('user')->where('id', $id)->first();
        return response()->json($client);
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
        $client = Client::find($id);
        $user = User::where('id', $client->user_id)->first();
        // dd($request->email);
        $client->lname = $request->lname2;
        $client->fname = $request->fname2;
        $client->addressline = $request->addressline2;
        $client->zipcode = $request->zipcode2;
        $client->phone = $request->phone2;

        // if ($request->hasFile('image_upload2')) {
        //     $files = $request->file('image_upload2');
        //     $image_path = $client->img_path;
        //     Storage::delete('public/'.$image_path);
        //     $client->image_path = 'storage/images/' . $files->getClientOriginalName();
        // }

        if($client->image_path == null) {
            if(request()->has('image_upload2')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $client->image_path = request()->file('image_upload2')->store('images', 'public');
            }
        } else {
            if(request()->has('image_upload2')){
                $image_path = $client->image_path;
                Storage::delete('public/'.$image_path);
                $client->image_path = request()->file('image_upload2')->store('images', 'public');
            }
        }

        $client->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $client->save();
 


        // Storage::put(
        //     'public/images/' . $files->getClientOriginalName(),
        //     file_get_contents($files)
        // );

        return response()->json([
            "success" => "customer update successfully.",
            "client" => $client,
            "status" => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
		$data = array('success' => 'deleted','code'=>200);
        return response()->json($data);
    }
}
