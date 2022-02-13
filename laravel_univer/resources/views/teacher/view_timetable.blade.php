@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($timetables as $timetable)

                    <a href="/teacher/view_group/subject_{{$timetable->subject_id}}/group_{{$timetable->group_id}}">{{$timetable->group_class.' '.$timetable->group_letter}}</a><br>
                    {{$timetable->subject_name}}<br>
                    {{$timetable->week_day}}<br>
                    {{$timetable->time}}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
