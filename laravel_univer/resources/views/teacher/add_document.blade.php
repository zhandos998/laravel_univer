@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/teacher/group/add_document/subject_{{$subject_id}}/group_{{$group_id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="date_from">Орындалу уақыты</label>
                            <input type="date" name="date_from" class="form-control" placeholder="Орындалу уақыты">
                        </div>
                        <div class="form-group">
                            <label for="document">Документ</label>
                            <input type="file" name="document" class="form-control" placeholder="Документ">
                        </div>
                        <button type="submit" class="btn btn-primary">Қосу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
