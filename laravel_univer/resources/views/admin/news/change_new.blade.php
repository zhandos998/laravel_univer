@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/change_new/{{$new->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" class="form-control" placeholder="Title" value="{{$new->title}}">
                        </div>
                        <div class="form-group">
                            <label for="discription">Discription</label>
                            <textarea name="discription" class="form-control" placeholder="Letter">{{$new->discription}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
