@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                <form method="POST" action="/admin/add_user">
                    @csrf
                    <div class="form-group">
                        <label for="username">Аты-жөні: </label>
                        <input name="name" type="username" class="form-control" placeholder="Аты-жөні">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail: </label>
                        <input name="email" type="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Құпия сөз: </label>
                        <input name="password" type="password" class="form-control" placeholder="Құпия сөз">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="0" checked>
                        <label class="form-check-label">
                            Студент
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="1">
                        <label class="form-check-label">
                            Мұғалім
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="2">
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
