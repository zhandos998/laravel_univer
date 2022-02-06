<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $user = User::find(2);
        dd(Auth::user()->hasRole('admin')); //вернёт true
        // dd(Auth::user());
        if (Auth::user()->hasRole('Admin'))
        {
            return redirect('\admin');
        }
        return view('home');
    }
}
