@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Teacher!') }}
                    @if (!is_null($group))
                        <a href="/teacher/view_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">View My Group</button></a>
                    @endif
                    <a href="/teacher/timetable"><button type="button" class="btn btn-outline-dark">Timetable</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
