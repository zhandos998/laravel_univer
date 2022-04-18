@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="/admin/add_quarter">
                        @csrf
                        <div class="form-group">
                            <label for="name">Тоқсанның аты: </label>
                            <input name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date_to">Басталу уақыты: </label>
                            <input type="date" name="date_to" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date_from">Аяқталу уақыты: </label>
                            <input type="date" name="date_from" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Қосу</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
