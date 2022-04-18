@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/teacher_timetable.webp') }}" alt="">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 5%">Сынып</th>
                            <th scope="col" style="width: 70%">Пән</th>
                            <th scope="col">Уақыты</th>
                          </tr>
                        </thead>
                        <tbody>
                    @for ($i = 0; $i < 6; $i++)
                    {{$boolean=false;}}
                        @foreach ($timetables as $timetable)

                            @if ($i==$timetable->week_day-1)
                                @if (!$boolean)
                                <tr>
                                    <th colspan="3" class="text-center">{{$week_days[$i]}}</td>
                                </tr>
                                <div class="d-none">{{$boolean=!$boolean;}}</div>
                                @endif

                                <tr>
                                    <th><a href="/teacher/view_group/subject_{{$timetable->subject_id}}/group_{{$timetable->group_id}}">{{$timetable->group_class.' '.$timetable->group_letter}}</a></th>
                                    <td>{{$timetable->subject_name}}</td>
                                    <td>{{date_format(date_create($timetable->time), 'H:i')}}</td>
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
