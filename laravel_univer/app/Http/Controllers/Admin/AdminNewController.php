<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNewController extends Controller
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

    public function view_news()
    {
        $news = DB::table('news')
        ->get();
        return view('admin.news.news',['news'=>$news]);
    }
    // public function view_new($id)
    // {
    //     $new = DB::table('news')
    //     ->where('news.id',$id)
    //     ->leftJoin('news_roles', 'news.id', '=', 'news_roles.new_id')
    //     ->leftJoin('roles', 'roles.id', '=', 'news_roles.role_id')
    //     ->select('news.id','news.name','news.email','roles.name as role')
    //     ->first();
    //     // dd($new);
    //     return view('admin.news.new',['new'=>$new]);
    // }

    public function add_new(Request $request)
    {
        if ($request->isMethod('post')){
            $new = new News();
            $new->title = $request->title;
            $new->discription = $request->discription;
            $new->save();

            return redirect("admin/news");
        }

        return view('admin.news.add_new');
    }

    public function change_new(Request $request,$id)
    {
        if ($request->isMethod('post')){
            DB::table('news')
            ->where('id',$id)
            ->update(array('title' => $request->title,'discription' => $request->discription));

            return redirect("/admin/news");
        }
        $new = DB::table('news')
        ->where("id",$id)
        ->first();
        return view('admin.news.change_new',['new'=>$new]);
    }

    public function delete_new($id)
    {
        $new = DB::table('news')
        ->where('news.id',$id)
        ->delete();
        return redirect("/admin/news");
    }
}
