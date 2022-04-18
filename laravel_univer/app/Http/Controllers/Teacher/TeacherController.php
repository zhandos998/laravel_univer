<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Grades;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $group = DB::table('groups')
        ->where('id_supervisor',Auth::id())
        ->first();
        $news = DB::table('news')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('teacher.home',['group'=>$group,'news'=>$news]);
    }


    public function view_group($subject_id=0,$group_id=0)
    {
        $students = DB::table('users')
        ->join('users_groups', 'users.id', '=', 'users_groups.user_id')
        ->join('groups', 'groups.id', '=', 'users_groups.group_id')
        ->select('users.id','users.name','users.email')
        ->where("groups.id",$group_id)
        ->get();

        $documents = DB::table('documents_groups')
        ->where("group_id",$group_id)
        ->where("teacher_id",Auth::id())
        ->where("subject_id",$subject_id)
        ->get();

        $group = DB::table('groups')
        ->where('id_supervisor',Auth::id())
        ->first();
        return view('teacher.view_group',['students'=>$students,'documents'=>$documents,'group_id'=>$group_id,'subject_id'=>$subject_id,'group'=>$group]);
    }

    public function timetable()
    {
        $timetables = DB::table('timetables')
        ->where('timetables.teacher_id',Auth::id())
        ->join('groups', 'timetables.group_id', '=', 'groups.id')
        ->join('subjects', 'timetables.subject_id', '=', 'subjects.id')
        ->select('timetables.id','subjects.name as subject_name','group_id','subject_id','groups.class as group_class','groups.letter as group_letter','timetables.week_day','timetables.time')
        ->get();
        $week_days = [
            "Дүйсенбі",
            "Сейсенбі",
            "Сәрсенбі",
            "Бейсенбі",
            "Жұма",
            "Сенбі"
        ];
        $group = DB::table('groups')
        ->where('id_supervisor',Auth::id())
        ->first();
        return view('teacher.view_timetable',['timetables'=>$timetables,'week_days'=>$week_days,'group'=>$group]);
    }

    public function add_document(Request $request,$subject_id,$group_id)
    {
        if ($request->isMethod('post')){
            $statement = DB::select("SHOW TABLE STATUS LIKE 'documents_groups'");
            $nextId = $statement[0]->Auto_increment;
            $fileNameToStore = "/documents_teachers/document_".$nextId.".".$request->document->extension();
            $request->document->storeAs('public/', $fileNameToStore);
            DB::table('documents_groups')
            ->insert([
                'date_from' => $request->date_from,
                'title' => $request->title,
                'document' => 'storage'.$fileNameToStore,
                'group_id' => $group_id,
                'subject_id' => $subject_id,
                'teacher_id' => Auth::id()
            ]);
            return redirect("/teacher/view_group/subject_".$subject_id."/group_".$group_id);
        }
        $group = DB::table('groups')
        ->where('id_supervisor',Auth::id())
        ->first();
        return view('teacher.add_document',['group_id'=>$group_id,'subject_id'=>$subject_id,'group'=>$group]);
    }

    public function view_student(Request $request,$subject_id,$student_id)
    {
        if ($request->isMethod('post')){
            $grade = new Grades();
            $grade->student_id = $student_id;
            $grade->teacher_id = Auth::id();
            $grade->grade = $request->grade;
            $grade->subject_id = $request->subject_id;
            $grade->quarter_id = DB::table('quarters')
                ->where('date_to','<=',DB::raw('now()'))
                ->where('date_from','>=',DB::raw('now()'))
                ->first()->id;
            $grade->save();

            return back();
        }
        $student = DB::table('users')
            ->where("id",$student_id)
            ->first();
        $subject = DB::table('subjects')
            ->where('id',$subject_id)
            ->first();
        $grades = DB::table('grades')
            ->where('subject_id',$subject_id)
            ->where('teacher_id',Auth::id())
            ->where('student_id',$student_id)
            ->where('quarter_id',
                DB::table('quarters')
                ->where('date_to','<=',DB::raw('now()'))
                ->where('date_from','>=',DB::raw('now()'))
                ->first()->id
            )
            ->get();
        $end_quarter = DB::table('quarters')
            ->where('date_to','<=',DB::raw('now()'))
            ->where('date_from','>=',DB::raw('now()'))
            ->select(DB::raw('DATEDIFF(`date_from`,now()) AS date_diff'),'id')
            ->first();
        $end_year = DB::table('years')
            ->where('date_to','<=',DB::raw('now()'))
            ->where('date_from','>=',DB::raw('now()'))
            ->select(DB::raw('DATEDIFF(`date_from`,now()) AS date_diff'),'id')
            ->first();

        $quarter_grades = DB::table('quarter_grades')
            ->where('subject_id',$subject_id)
            ->where('student_id',$student_id)
            ->where('quarter_id',$end_quarter->id)
            ->first();
        $year_grades = DB::table('year_grades')
            ->where('subject_id',$subject_id)
            ->where('student_id',$student_id)
            ->where('year_id',$end_year->id)
            ->first();

        $student_documents = DB::table('documents_teachers')
            ->where("documents_teachers.teacher_id",Auth::id())
            ->where("documents_teachers.subject_id",$subject_id)
            ->where("documents_teachers.student_id",$student_id)
            ->join('documents_groups', 'documents_groups.id', '=', 'documents_teachers.document_id')
            ->select('documents_teachers.id','documents_teachers.document','documents_groups.title')
            ->get();

        $group = DB::table('groups')
        ->where('id_supervisor',Auth::id())
        ->first();
        return view('teacher.view_student',[
            'student'=>$student,
            'grades'=>$grades,
            'subject'=>$subject,
            'subject_id'=>$subject_id,
            'end_quarter'=>$end_quarter,
            'quarter_grades'=>$quarter_grades,
            'end_year'=>$end_year,
            'year_grades'=>$year_grades,
            'student_documents'=>$student_documents,
            'group'=>$group
        ]);
    }

    public function quarter_grade(Request $request)
    {
        if ($request->isMethod('post')){
            DB::table('quarter_grades')
            ->insert([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'quarter_id' => $request->quarter_id,
                'grade' => $request->grade,
            ]);

            return back();
        }
        return back();
    }

    public function year_grade(Request $request)
    {
        if ($request->isMethod('post')){
            // dd($request);
            DB::table('year_grades')
            ->insert([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'year_id' => $request->year_id,
                'grade' => $request->grade,
            ]);

            return back();
        }
        return back();
    }
}
