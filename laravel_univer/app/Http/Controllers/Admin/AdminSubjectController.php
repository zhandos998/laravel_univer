<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subjects;

class AdminSubjectController extends Controller
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

    public function view_subjects()
    {
        $subjects = DB::table('subjects')
        ->get();
        return view('admin.subjects.subjects',['subjects'=>$subjects]);
    }

    public function add_subject(Request $request)
    {
        if ($request->isMethod('post')){
            $subjects = new Subjects();
            $subjects->name = $request->name;
            $subjects->save();
            return redirect('/admin/subjects');
        }
        return view('admin.subjects.add_subject');
    }

    public function change_subject(Request $request,$id)
    {
        if ($request->isMethod('post')){
            DB::table('subjects')
            ->where('id',$id)
            ->update(array('name' => $request->name));
            return redirect("/admin/subjects");
        }
        $subject = DB::table('subjects')
        ->where("id",$id)
        ->first();
        return view('admin.subjects.change_subject',['subject'=>$subject]);
    }
    public function delete_subject($id)
    {
        DB::table('subjects')
        ->where('id',$id)
        ->delete();
        return redirect("/admin/subjects");
    }

    // public function add_to_group(Request $request,$id)
    // {
    //     if ($request->isMethod('post')){
    //         DB::table('subjects_groups')
    //         ->insert([
    //             'subject_id' => $id,
    //             'group_id' => $request->group_id
    //         ]);
    //         return redirect("/admin/subjects");
    //     }
    //     $groups = DB::table('groups')
    //     ->join('users', 'users.id', '=', 'groups.id_supervisor')
    //     ->select('groups.id', 'groups.class', 'groups.letter', 'users.name')
    //     ->get();
    //     return view('admin.subjects.add_to_group',['groups'=>$groups,'id'=>$id]);
    // }
}
