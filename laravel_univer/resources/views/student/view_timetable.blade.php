@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($timetables as $timetable)

                    <a href="/student/view_lesson/subject_{{$timetable->subject_id}}/teacher_{{$timetable->teacher_id}}">{{$timetable->teacher_name}}</a>|
                    {{$timetable->subject_name}}|
                    {{$week_days[$timetable->week_day-1]}}|
                    {{date_format(date_create($timetable->time), 'H:i')}}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
