@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                <form method="POST" action="/admin/add_new">
                    @csrf
                    <div class="form-group">
                        <label for="title">Жаңалықтың тақырыбы</label>
                        <input name="title" class="form-control" placeholder="Жаңалықтың тақырыбы">
                    </div>
                    <div class="form-group">
                        <label for="discription">Текст</label>
                        <textarea name="discription" class="form-control" placeholder="Текст"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Қосу</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
