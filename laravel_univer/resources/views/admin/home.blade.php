@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/admin/users"><button type="button" class="btn btn-outline-dark">Қолданушылар</button></a>
                    <a href="/admin/subjects"><button type="button" class="btn btn-outline-dark">Пәндер</button></a>
                    <a href="/admin/groups"><button type="button" class="btn btn-outline-dark">Сыныптар</button></a>
                    <a href="/admin/news"><button type="button" class="btn btn-outline-dark">Жаңалықтар</button></a>
                    <a href="/admin/add_quarter"><button type="button" class="btn btn-outline-dark">Тоқсан қосу</button></a>
                    <a href="/admin/add_year"><button type="button" class="btn btn-outline-dark">Оқу жылын қосу</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
