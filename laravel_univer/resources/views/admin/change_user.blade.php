@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/change_user/{{$user->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="name" type="username" class="form-control" placeholder="Username" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="0" @if (is_null($user->role)) checked @endif>
                            <label class="form-check-label">
                                Student
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="1" @if ($user->role==1) checked @endif>
                            <label class="form-check-label">
                                Teacher
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="2" @if ($user->role==2) checked @endif>
                            <label class="form-check-label">
                                Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                    {{$user->role}}<br>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
