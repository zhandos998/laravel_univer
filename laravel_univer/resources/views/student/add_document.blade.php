@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/student_document.jpg') }}" alt="">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>
                <div class="card-body">
                    <form method="POST" action="/student/add_document/subject_{{$subject_id}}/teacher_{{$teacher_id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="document">Тақырып</label>
                            <select class="form-select" name="document_id">
                                @foreach ($documents as $document)
                                    <option value="{{$document->id}}">{{$document->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="document">Документ</label>
                            <input type="file" name="document" class="form-control" placeholder="Document">
                        </div>
                        <button type="submit" class="btn btn-primary">Қосу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
