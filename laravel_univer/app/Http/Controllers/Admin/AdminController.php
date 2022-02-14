<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quarter;
use Illuminate\Http\Request;
use App\Models\Year;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function add_quarter(Request $request)
    {
        if ($request->isMethod('post')){
            $quarter = new Quarter();
            $quarter->name=$request->name;
            $quarter->date_to=$request->date_to;
            $quarter->date_from=$request->date_from;
            $quarter->save();
            return redirect('/admin');
        }
        return view('admin.add_quarter');
    }
    public function add_year(Request $request)
    {
        if ($request->isMethod('post')){
            $quarter = new Year();
            $quarter->name=$request->name;
            $quarter->date_to=$request->date_to;
            $quarter->date_from=$request->date_from;
            $quarter->save();
            return redirect('/admin');
        }
        return view('admin.add_year');
    }
}
