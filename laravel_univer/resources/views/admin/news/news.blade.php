@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <a href="/admin/add_new"><button type="button" class="btn btn-outline-dark">Жаңалықты қосу</button></a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Тақырыбы</th>
                            <th scope="col">Дата</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($news as $new)

                    <tr>
                        <th scope="row">{{$new->id}}</th>
                        <td>{{$new->title}}</td>
                        <td>{{$new->created_at}}</td>
                        <td><a href="/admin/change_new/{{$new->id}}"><button type="button" class="btn btn-outline-dark">Жаңалықты өзгерту</button></a></td>
                        <td><a href="/admin/delete_new/{{$new->id}}"><button type="button" class="btn btn-outline-dark">Жаңалықты жою</button></a></td>
                    </tr>



                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
