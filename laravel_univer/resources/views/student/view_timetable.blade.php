@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/student_timetable.png') }}" alt="">

            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 20%">Мұғалім</th>
                            <th scope="col" style="width: 70%">Пән</th>
                            <th scope="col">Уақыты</th>
                          </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 6; $i++)
                            {{$boolean=false;}}
                        @foreach ($timetables as $timetable)@if ($i==$timetable->week_day-1)
                        @if (!$boolean)
                        <tr>
                            <th colspan="3" class="text-center">{{$week_days[$i]}}</td>
                        </tr>
                        <div class="d-none">{{$boolean=!$boolean;}}</div>
                        @endif

                            <tr>
                                <th scope="col"><a href="/student/view_lesson/subject_{{$timetable->subject_id}}/teacher_{{$timetable->teacher_id}}">{{$timetable->teacher_name}}</a></th>
                                <td scope="col">{{$timetable->subject_name}}</td>
                                <td scope="col">{{date_format(date_create($timetable->time), 'H:i')}}</td>
                            </tr>
                            @endif
                        @endforeach
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
