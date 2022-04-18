@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Аты-жөні</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Рөл</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="/admin/change_user/{{$user->id}}"><button type="button" class="btn btn-outline-dark">Қолданушыны өзгерту</button></a>
                    <a href="/admin/delete_user/{{$user->id}}"><button type="button" class="btn btn-outline-dark">Қолданушыны жою</button></a>
                    @if ($add_to_group)
                        <a href="/admin/user/add_to_group/{{$user->id}}"><button type="button" class="btn btn-outline-dark">Қолданушыны группаға қосу</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
