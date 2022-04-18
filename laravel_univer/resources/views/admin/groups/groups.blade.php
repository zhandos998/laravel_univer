@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <a href="/admin/add_group"><button type="button" class="btn btn-outline-dark">Сынып қосу</button></a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Сынып</th>
                            <th scope="col">Сынып жетекшісі</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($groups as $group)
                    <tr>
                        <th scope="row"><a href="/admin/group/{{$group->id}}">{{$group->id}}</a></th>
                        <td>{{$group->class}} "{{$group->letter}}"</td>
                        <td>{{$group->name}}</td>
                        <td><a href="/admin/change_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Сыныпты өзгерту</button></a></td>
                        <td><a href="/admin/delete_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Сыныпты жою</button></a></td>
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
