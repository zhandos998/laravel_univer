@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/change_subject/{{$subject->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Пәннің аты: </label>
                            <input name="name" type="name" class="form-control" placeholder="Пәннің аты" value="{{$subject->name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Өзгерту</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
