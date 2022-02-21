@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    @if (!is_null($group))
                        <a href="/teacher/view_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Сыныбымды қарау</button></a>
                    @endif
                    <a href="/teacher/timetable"><button type="button" class="btn btn-outline-dark">Сабақ кестесі</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
