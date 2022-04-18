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
                            <th scope="col" style="width: 100%">Пән</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($subjects as $subject)

                    <tr>
                        <th scope="row">{{$subject->id}}</th>
                        <td>{{$subject->name}}</td>
                        <td>
                            <a href="/admin/change_subject/{{$subject->id}}"><button type="button" class="btn btn-outline-dark">Пәнді өзгерту</button></a>
                        </td>
                        <td>
                            <a href="/admin/delete_subject/{{$subject->id}}"><button type="button" class="btn btn-outline-dark">Пәнді жою</button></a>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>

                    <a href="/admin/add_subject"><button type="button" class="btn btn-outline-dark">Пәнді қосу</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
