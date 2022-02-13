@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    {{$group->class}}<br>
                    {{$group->letter}}<br>
                    {{$group->name}}<br>
                    @foreach ($students as $student)
                        {{$student->id}}<br>
                        <a href="/admin/user/{{$student->id}}">{{$student->name}}</a><br>
                        {{$student->email}}<br>
                        <a href="/admin/remove_from_group/{{$student->id}}"><button type="button" class="btn btn-outline-dark">Remove From Group</button></a><br>
                    @endforeach
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/change_group/{{$group->id}}">Change Group</a></button><br>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/delete_group/{{$group->id}}">Delete Group</a></button><br>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/group/view_subjects/{{$group->id}}">View Subjects</a></button><br>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
