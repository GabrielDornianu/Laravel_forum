<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum')->with('d', Discussion::orderBy('created_at', 'desc')->paginate(5));
    }
}
