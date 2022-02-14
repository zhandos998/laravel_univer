@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                        {{$student->id}}<br>
                        <a href="/teacher/view_student/subject_{{$subject_id}}/student_{{$student->id}}">{{$student->name}}</a><br>
                        {{$student->email}}<br>


                        @foreach ($grades as $grade)
                            {{$grade->grade}}<br>
                            {{$grade->created_at}}<br>
                        @endforeach

                        <form method="POST" action="/teacher/view_student/subject_{{$subject_id}}/student_{{$student->id}}">
                            @csrf
                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <input type="number" name="grade" class="form-control">
                            </div>
                            <input name="subject_id" value="{{$subject_id}}" class="d-none">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                        @if (($end_quarter->date_diff<=7) && is_null($quarter_grades))
                            <form method="POST" action="/teacher/quarter_grade">
                                @csrf
                                <input name="subject_id" value="{{$subject_id}}" class="d-none">
                                <input name="student_id" value="{{$student->id}}" class="d-none">
                                <input name="quarter_id" value="{{$end_quarter->id}}" class="d-none">
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="number" name="grade" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        @endif
                        
                        @if (($end_year->date_diff<=7) && is_null($year_grades))
                            <form method="POST" action="/teacher/year_grade">
                                @csrf
                                <input name="subject_id" value="{{$subject_id}}" class="d-none">
                                <input name="student_id" value="{{$student->id}}" class="d-none">
                                <input name="year_id" value="{{$end_year->id}}" class="d-none">
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="number" name="grade" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
