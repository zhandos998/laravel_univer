@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    {{$user->id}}<br>
                    <a href="/admin/user/{{$user->id}}">{{$user->name}}</a><br>
                    {{$user->email}}<br>
                    {{$user->role}}<br>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/change_user/{{$user->id}}">Change</a></button>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/delete_user/{{$user->id}}">Delete User</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
