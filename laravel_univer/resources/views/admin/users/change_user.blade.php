@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/change_user/{{$user->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Аты-жөні: </label>
                            <input name="name" type="username" class="form-control" placeholder="Аты-жөні" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail: </label>
                            <input name="email" type="email" class="form-control" placeholder="E-mail" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Құпия сөз: </label>
                            <input name="password" type="password" class="form-control" placeholder="Құпия сөз">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="0" @if (is_null($user->role)) checked @endif>
                            <label class="form-check-label">
                                Студент
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="1" @if ($user->role==1) checked @endif>
                            <label class="form-check-label">
                                Мұғалім
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="2" @if ($user->role==2) checked @endif>
                            <label class="form-check-label">
                                Администратор
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Қосу</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
