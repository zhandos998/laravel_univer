<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Grades;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       $news = DB::table('news')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('student.home',['news'=>$news]);
    }

    public function timetable()
    {
        $timetables = DB::table('timetables')
        // ->where('timetables.teacher_id',Auth::id())
        ->join('users', 'timetables.teacher_id', '=', 'users.id')
        ->join('subjects', 'timetables.subject_id', '=', 'subjects.id')
        ->join('groups', 'timetables.group_id', '=', 'groups.id')
        ->join('users_groups', 'users_groups.group_id', '=', 'groups.id')
        ->where('users_groups.user_id',Auth::id())
        ->select('subjects.name as subject_name','subject_id','users.name as teacher_name','users.id as teacher_id','timetables.week_day','timetables.time')
        ->get();
        $week_days = [
            "Дүйсенбі",
            "Сейсенбі",
            "Сәрсенбі",
            "Бейсенбі",
            "Жұма",
            "Сенбі"
        ];
        // dd($timetables);
        return view('student.view_timetable',['timetables'=>$timetables ,'week_days' => $week_days]);
    }

    public function view_lesson($subject_id,$teacher_id)
    {
        $grades = DB::table('grades')
        ->where("teacher_id",$teacher_id)
        ->where("subject_id",$subject_id)
        ->where("student_id",Auth::id())
        ->where("quarter_id",
            DB::table('quarters')
            ->where('date_to','<=',DB::raw('now()'))
            ->where('date_from','>=',DB::raw('now()'))
            ->first()->id
        )
        ->get();

        $teacher = DB::table('users')
        ->where('id',$teacher_id)
        ->first();
        $subject = DB::table('subjects')
        ->where('id',$subject_id)
        ->first();

        $quarter_grade = DB::table('quarter_grades')
        ->where("subject_id",$subject_id)
        ->where("student_id",Auth::id())
        ->where("quarter_id",
            DB::table('quarters')
            ->where('date_to','<=',DB::raw('now()'))
            ->where('date_from','>=',DB::raw('now()'))
            ->first()->id
        )
        ->first();

        $year_grade = DB::table('year_grades')
        ->where("subject_id",$subject_id)
        ->where("student_id",Auth::id())
        ->where("year_id",
            DB::table('years')
            ->where('date_to','<=',DB::raw('now()'))
            ->where('date_from','>=',DB::raw('now()'))
            ->first()->id
        )
        ->first();

        $documents = DB::table('documents_groups')
            ->where("teacher_id",$teacher_id)
            ->where("subject_id",$subject_id)
            ->join('groups', 'groups.id', '=', 'documents_groups.group_id')
            ->join('users_groups', 'groups.id', '=', 'users_groups.group_id')
            ->where("users_groups.user_id",Auth::id())
            ->select('documents_groups.id','documents_groups.date_from','documents_groups.document','documents_groups.title')
            ->get();

        $my_documents = DB::table('documents_teachers')
            ->where("documents_teachers.teacher_id",$teacher_id)
            ->where("documents_teachers.subject_id",$subject_id)
            ->where("documents_teachers.student_id",Auth::id())
            ->join('documents_groups', 'documents_groups.id', '=', 'documents_teachers.document_id')
            ->select('documents_teachers.id','documents_teachers.document','documents_groups.title')
            ->get();

        return view('student.view_lesson',[
            'grades'=>$grades,
            'documents'=>$documents,
            'my_documents'=>$my_documents,
            'teacher'=>$teacher,
            'subject'=>$subject,
            'quarter_grade'=>$quarter_grade,
            'year_grade'=>$year_grade
        ]);
    }

    public function add_document(Request $request,$subject_id,$teacher_id)
    {
        if ($request->isMethod('post')){
            // dd($request);
            $statement = DB::select("SHOW TABLE STATUS LIKE 'documents_teachers'");
            $nextId = $statement[0]->Auto_increment;
            $fileNameToStore = "/documents_students/document_".$nextId.".".$request->document->extension();
            $request->document->storeAs('public/', $fileNameToStore);
            DB::table('documents_teachers')
            ->insert([
                'document' => 'storage'.$fileNameToStore,
                'student_id' => Auth::id(),
                'subject_id' => $subject_id,
                'document_id' => $request->document_id,
                'teacher_id' => $teacher_id
            ]);
            return redirect("/student/view_lesson/subject_".$subject_id."/teacher_".$teacher_id);
        }
        $documents = DB::table('documents_groups')
        ->where("teacher_id",$teacher_id)
        ->where("subject_id",$subject_id)
        ->join('groups', 'groups.id', '=', 'documents_groups.group_id')
        ->join('users_groups', 'groups.id', '=', 'users_groups.group_id')
        ->where("users_groups.user_id",Auth::id())
        ->get();
        return view('student.add_document',['teacher_id'=>$teacher_id,'subject_id'=>$subject_id,'documents'=>$documents]);
    }
}
