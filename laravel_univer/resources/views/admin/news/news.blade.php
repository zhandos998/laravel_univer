@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">

                    <button type="button" class="btn btn-outline-dark"><a href="/admin/add_new">Add New</a></button>
                    @foreach ($news as $new)
                    {{$new->id}}<br>
                    {{$new->title}}<br>
                    {{$new->discription}}<br>
                    {{$new->created_at}}<br>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/change_new/{{$new->id}}">Change New</a></button><br>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/delete_new/{{$new->id}}">Delete New</a></button><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
