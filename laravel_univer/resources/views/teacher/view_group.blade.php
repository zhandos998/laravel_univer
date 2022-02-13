@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- {{$group->class}}<br>
                    {{$group->letter}}<br>
                    {{$group->name}}<br> --}}
                    @foreach ($students as $student)
                        {{$student->id}}<br>
                        <a href="/teacher/view_student/subject_{{$subject_id}}/student_{{$student->id}}">{{$student->name}}</a><br>
                        {{$student->email}}<br>
                    @endforeach

                    @foreach ($documents as $document)
                        {{$document->id}}<br>
                        {{$document->date_from}}<br>
                        <a href="{{ asset($document->document) }}" download>{{$document->document}}</a><br>
                    @endforeach
                    <button type="button" class="btn btn-outline-dark"><a href="/teacher/group/add_document/subject_{{$subject_id}}/group_{{$group_id}}">Add document</a></button><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
