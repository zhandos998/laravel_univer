@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Сынып</th>
                            <th scope="col">Пән</th>
                            <th scope="col">Апта күні</th>
                            <th scope="col">Уақыты</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($timetables as $timetable)

                    <tr>
                        <th><a href="/teacher/view_group/subject_{{$timetable->subject_id}}/group_{{$timetable->group_id}}">{{$timetable->group_class.' '.$timetable->group_letter}}</a></th>
                        <td>{{$timetable->subject_name}}</td>
                        <td>{{$week_days[$timetable->week_day-1]}}</td>
                        <td>{{date_format(date_create($timetable->time), 'H:i')}}</td>
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
