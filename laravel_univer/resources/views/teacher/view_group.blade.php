@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/teacher_group.jpg') }}" alt="">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Аты-жөні</th>
                            <th scope="col">E-mail</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <th>{{$student->id}}</th>
                            <td>
                                @if ($subject_id!=0)<a href="/teacher/view_student/subject_{{$subject_id}}/student_{{$student->id}}">@endif{{$student->name}}</a></td>
                            <td>{{$student->email}}</td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                    @if ($subject_id!=0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Орындалу уақыты</th>
                                    <th scope="col">Документ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <th>{{$document->id}}</th>
                                    <td>{{date_format(date_create($document->date_from), 'd.m.Y')}}</td>
                                    <td><a href="{{ asset($document->document) }}" download>{{$document->title}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <button type="button" class="btn btn-outline-dark"><a href="/teacher/group/add_document/subject_{{$subject_id}}/group_{{$group_id}}">Документ қосу</a></button><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
