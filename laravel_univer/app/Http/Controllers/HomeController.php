<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->hasRole('admin'))
        {
            return redirect('admin');
        }
        if (Auth::user()->hasRole('teacher'))
        {
            return redirect('teacher');
        }
        if (Auth::user()->hasRole('student'))
        {
            return redirect('student');
        }
        return view('home');
    }
}
