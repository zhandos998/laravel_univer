@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/admin/change_new/{{$new->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Жаңалықтың тақырыбы</label>
                            <input name="title" class="form-control" placeholder="Жаңалықтың тақырыбы" value="{{$new->title}}">
                        </div>
                        <div class="form-group">
                            <label for="discription">Текст</label>
                            <textarea name="discription" class="form-control" placeholder="Текст">{{$new->discription}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Өзгерту</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
