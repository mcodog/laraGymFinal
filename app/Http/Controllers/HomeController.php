<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Program;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home() {
        $userId = auth()->id(); // Get the currently logged-in user ID
        $accountExists = \App\Models\Account::where('client_id', $userId)->exists();

        $programs = Program::orderBy('id', 'DESC')->take(10)->get();

        foreach ($programs as $program) {
            $coach_id = $program->coach_id;
            $coach = Coach::find($coach_id);
            $program->coach = $coach; 
        }

        return view('welcome', compact('accountExists', 'programs'));
    }
}
