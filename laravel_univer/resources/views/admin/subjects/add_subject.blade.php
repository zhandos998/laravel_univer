@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/add_subject">
                        @csrf
                        <div class="form-group">
                            <label for="name">Пәннің аты: </label>
                            <input name="name" type="name" class="form-control" placeholder="Пәннің аты">
                        </div>
                        <button type="submit" class="btn btn-primary">Қосу</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
