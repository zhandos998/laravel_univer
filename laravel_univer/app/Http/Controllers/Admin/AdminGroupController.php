<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminGroupController extends Controller
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

    public function view_groups()
    {
        $groups = DB::table('groups')
        ->join('users', 'users.id', '=', 'groups.id_supervisor')
        ->select("groups.*",'users.name')
        ->get();
        return view('admin.groups.groups',['groups'=>$groups]);
    }

    public function view_group($id)
    {
        $group = DB::table('groups')
        ->join('users', 'users.id', '=', 'groups.id_supervisor')
        ->select("groups.*",'users.name')
        ->where("groups.id",$id)
        ->first();
        $students = DB::table('users')
        ->join('users_groups', 'users.id', '=', 'users_groups.user_id')
        ->join('groups', 'groups.id', '=', 'users_groups.group_id')
        ->select('users.id','users.name','users.email')
        ->where("groups.id",$id)
        ->get();
        return view('admin.groups.group',['group'=>$group,"students"=>$students]);
    }

    public function add_group(Request $request)
    {
        if ($request->isMethod('post')){
            $group = new Groups();
            $group->class = $request->class;
            $group->letter = $request->letter;
            $group->id_supervisor = $request->teacher_id;
            $group->save();

            return redirect("admin/groups");
        }
        $teachers = DB::table("users")
        ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->join('roles', 'roles.id', '=', 'users_roles.role_id')
        ->select("users.id",'users.name')
        ->where("roles.slug","teacher")
        ->get();
        return view('admin.groups.add_group',["teachers"=>$teachers]);
    }

    public function change_group(Request $request,$id)
    {
        if ($request->isMethod('post')){
            DB::table('groups')
            ->where('groups.id',$id)
            ->update(array('class' => $request->class,'letter' => $request->letter,'id_supervisor' => $request->teacher_id));

            return redirect("/admin/groups");
        }
        $group = DB::table('groups')
        ->join('users', 'users.id', '=', 'groups.id_supervisor')
        ->select("groups.*",'users.name')
        ->where("groups.id",$id)
        ->first();
        $teachers = DB::table("users")
        ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->join('roles', 'roles.id', '=', 'users_roles.role_id')
        ->select("users.id",'users.name')
        ->where("roles.slug","teacher")
        ->get();
        return view('admin.groups.change_group',['group'=>$group,"teachers"=>$teachers]);
    }

    public function delete_group($id)
    {
        DB::table('groups')
        ->where('groups.id',$id)
        ->delete();
        return redirect("/admin/groups");
    }

    public function add_students(Request $request,$id)
    {
        if ($request->isMethod('post')){
            $group = new Groups();
            $group->class = $request->class;
            $group->letter = $request->letter;
            $group->id_supervisor = $request->teacher_id;
            $group->save();

            return redirect("admin/groups");
        }
        $students = DB::table("users")
        ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->join('roles', 'roles.id', '=', 'users_roles.role_id')
        ->select("users.id",'users.name')
        ->where("roles.slug","student")
        ->get();
        return view('admin.groups.add_students',["students"=>$students,"id"=>$id]);
    }
}
