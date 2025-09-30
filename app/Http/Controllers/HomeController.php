<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternalCourse;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the single internal course record (assuming only one exists)
        $internalCourse = InternalCourse::first();

        return view('home', compact('internalCourse'));
    }
}
