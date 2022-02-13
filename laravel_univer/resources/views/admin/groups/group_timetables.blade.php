@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <button type="button" class="btn btn-outline-dark"><a href="/admin/group/add_subject/{{$id}}">Add Subject</a></button>
                    @foreach ($timetables as $timetable)
                    {{$timetable->subject_name}}</a><br>
                    {{$timetable->teacher_name}}<br>
                    {{$timetable->week_day}}<br>
                    {{$timetable->time}}<br>
                    <a href="/admin/group/delete_subject/{{$timetable->id}}"><button type="button" class="btn btn-outline-dark">Delete Subject</button></a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
