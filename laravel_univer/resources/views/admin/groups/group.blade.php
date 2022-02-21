@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Сынып жетекшісі</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$group->class}} "{{$group->letter}}"</th>
                                <td>{{$group->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Аты-жөні: </th>
                            <th scope="col">E-mail:</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($students as $student)
                    
                            <tr>
                                <th scope="row">{{$student->id}}</th>
                                <td><a href="/admin/user/{{$student->id}}">{{$student->name}}</a></td>
                                <td>{{$student->email}}</td>
                                <td><a href="/admin/remove_from_group/{{$student->id}}"><button type="button" class="btn btn-outline-dark">Сыныптан жою</button></a></td>
                            </tr>
                        
                    @endforeach
                        </tbody>
                    </table>
                    <a href="/admin/change_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Сыныпты өзгерту</button></a><br><br>
                    <a href="/admin/delete_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Сыныпты жою</button></a><br><br>
                    <a href="/admin/group/view_subjects/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Пәндерін қарау</button></a><br><br>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
