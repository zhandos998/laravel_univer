@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <a href="/admin/group/add_subject/{{$id}}"><button type="button" class="btn btn-outline-dark">Пәнді қосу</button></a>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Пән</th>
                            <th scope="col">Мұғалім</th>
                            <th scope="col">Апта күні</th>
                            <th scope="col">Уақыты</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($timetables as $timetable)
                    <tr>
                        <th scope="row">{{$timetable->subject_name}}</th>
                        <td>{{$timetable->teacher_name}}</td>
                        <td>{{$timetable->week_day}}</td>
                        <td>{{$timetable->time}}</td>
                        <td><a href="/admin/group/delete_subject/{{$timetable->id}}"><button type="button" class="btn btn-outline-dark">Delete Subject</button></a></td>
                    </tr>
                    @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
