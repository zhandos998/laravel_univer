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



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
