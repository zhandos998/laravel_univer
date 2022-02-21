@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <button type="button" class="btn btn-outline-dark"><a href="/admin/add_user">Қолданушыны қосу</a></button>
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
                    @foreach ($users as $user)
                    
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
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
