<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class AdminUserController extends Controller
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

    public function view_users()
    {
        $users = DB::table('users')
        ->leftJoin('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->leftJoin('roles', 'roles.id', '=', 'users_roles.role_id')
        ->select('users.id','users.name','users.email','roles.name as role')
        ->get();
        return view('admin.users.users',['users'=>$users]);
    }
    public function view_user($id)
    {
        $user = DB::table('users')
        ->where('users.id',$id)
        ->leftJoin('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->leftJoin('roles', 'roles.id', '=', 'users_roles.role_id')
        ->select('users.id','users.name','users.email','roles.name as role')
        ->first();
        $add_to_group = !(count(DB::table('users_groups')->where('user_id',$id)->get())>0);

        // dd($user);
        return view('admin.users.user',['user'=>$user, 'add_to_group'=>$add_to_group]);
    }

    public function add_user(Request $request)
    {
        if ($request->isMethod('post')){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            if($request->role==1)
                $user->roles()->attach(Role::where('slug','teacher')->first());
            else if($request->role==2)
                $user->roles()->attach(Role::where('slug','admin')->first());
            else
                $user->roles()->attach(Role::where('slug','student')->first());
            return redirect("admin/users");
        }
        return view('admin.users.add_user');
    }

    public function change_user(Request $request,$id)
    {
        if ($request->isMethod('post')){
            DB::table('users')
            ->where('users.id',$id)
            ->update(array('name' => $request->name,'email' => $request->email,'password' => bcrypt($request->password)));

            $user_role = DB::table('users_roles')
            ->where('user_id',$id);

            if($request->role==1)
                $user_role->update(array('role_id' => 1));
            else if($request->role==2)
                $user_role->update(array('role_id' => 2));
            else
                $user_role->update(array('role_id' => 3));
            return redirect("/admin/users");
        }
        $user = DB::table('users')
        ->where('users.id',$id)
        ->leftJoin('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->select('users.id','users.name','users.email','users_roles.role_id as role')
        ->first();
        return view('admin.users.change_user',['user'=>$user]);
    }

    public function delete_user($id)
    {
        DB::table('users')
        ->where('users.id',$id)
        ->delete();
        return redirect("/admin/users");
    }

    public function add_to_group(Request $request,$id)
    {

        if ($request->isMethod('post')){
            DB::table('users_groups')
            ->insert([
                'user_id' => $id,
                'group_id' => $request->group_id
            ]);
            return redirect("/admin/users");
        }
        $groups = DB::table('groups')
        ->join('users', 'users.id', '=', 'groups.id_supervisor')
        ->select('groups.id', 'groups.class', 'groups.letter', 'users.name')
        ->get();
        return view('admin.users.add_to_group',['groups'=>$groups,'id'=>$id]);
    }
}
