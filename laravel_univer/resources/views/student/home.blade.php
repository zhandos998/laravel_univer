@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    <a href="/student/timetable"><button type="button" class="btn btn-outline-dark">Сабақ кестесі</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
