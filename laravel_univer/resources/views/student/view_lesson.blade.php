@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Teacher name: {{$teacher->name}}<br>
                    Subject name: {{$subject->name}}<br>
                    Grades:<br>
                    @foreach ($grades as $grade)
                        {{date_format(date_create($grade->created_at), 'd.m.Y')}} |
                        {{$grade->grade}}<br>
                    @endforeach

                    @if (!is_null($quarter_grade))
                        Quarter grade: {{$quarter_grade->grade}}<br>
                    @endif

                    @if (!is_null($year_grade))
                        Year grade: {{$year_grade->grade}}<br>
                    @endif
                    My Documents:<br>
                    @foreach ($my_documents as $my_document)
                        {{$my_document->id}}|
                        {{-- {{$my_document->created_at}}| --}}
                        <a href="{{ asset($my_document->document) }}" download>{{$my_document->document}}</a><br>
                    @endforeach
                    
                    Teacher Documents:<br>
                    @foreach ($documents as $document)
                        {{$document->id}}|
                        {{$document->date_from}}|
                        <a href="{{ asset($document->document) }}" download>{{$document->document}}</a><br>
                    @endforeach
                    <a href="/student/add_document/subject_{{$subject->id}}/teacher_{{$teacher->id}}"><button type="button" class="btn btn-outline-dark">Add document</button></a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
