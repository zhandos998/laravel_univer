@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <button type="button" class="btn btn-outline-dark"><a href="/admin/add_user">Қолданушыны қосу</a></button>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Пән</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($users as $user)
                    {{$user->id}}<br>
                    <a href="/admin/user/{{$user->id}}">{{$user->name}}</a><br>
                    {{$user->email}}<br>
                    {{$user->role}}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
