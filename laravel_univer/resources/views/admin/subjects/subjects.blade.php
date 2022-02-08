@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    @foreach ($subjects as $subject)
                        {{$subject->id}}<br>
                        {{$subject->name}}<br>
                        <button type="button" class="btn btn-outline-dark"><a href="/admin/change_subject/{{$subject->id}}">Change Subject</a></button><br>
                        <button type="button" class="btn btn-outline-dark"><a href="/admin/delete_subject/{{$subject->id}}">Delete Subject</a></button><br>
                    @endforeach

                    <button type="button" class="btn btn-outline-dark"><a href="/admin/add_subject">Add Subject</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
