@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/teacher_student.png') }}" alt="">


            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    <h1 class="display-3">{{$student->name}}</h1>
                    <p><small>{{$student->email}}<br>{{$subject->name}}</small></p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Баға</th>
                                    <th scope="col">Қойылған күні</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($grades)>0)
                                    @foreach ($grades as $grade)
                                        <tr>
                                            <th>{{$grade->grade}}</th>
                                            <th>{{date_format(date_create($grade->created_at), 'd.m.Y')}}</th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center">Бағалар әзірге жоқ</td>
                                    </tr>
                                @endif
                              </tbody>
                          </table>

                        <h3>Студенттің документтері:</h3>
                          <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Документ</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($student_documents as $document)
                        <tr>
                            <th>{{$document->id}}</th>
                            <th><a href="{{ asset($document->document) }}" download>{{$document->title}}</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                        <form method="POST" action="/teacher/view_student/subject_{{$subject_id}}/student_{{$student->id}}">
                            @csrf
                            <div class="form-group">
                                <label for="grade">Баға</label>
                                <input type="number" name="grade" class="form-control">
                            </div>
                            <input name="subject_id" value="{{$subject_id}}" class="d-none">
                            <button type="submit" class="btn btn-primary">Баға қою</button>
                        </form>
                        @if (($end_quarter->date_diff<=7) && is_null($quarter_grades))
                            <form method="POST" action="/teacher/quarter_grade">
                                @csrf
                                <input name="subject_id" value="{{$subject_id}}" class="d-none">
                                <input name="student_id" value="{{$student->id}}" class="d-none">
                                <input name="quarter_id" value="{{$end_quarter->id}}" class="d-none">
                                <div class="form-group">
                                    <label for="grade">Тоқсандық баға</label>
                                    <input type="number" name="grade" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        @endif

                        @if (($end_year->date_diff<=7) && is_null($year_grades))
                            <form method="POST" action="/teacher/year_grade">
                                @csrf
                                <input name="subject_id" value="{{$subject_id}}" class="d-none">
                                <input name="student_id" value="{{$student->id}}" class="d-none">
                                <input name="year_id" value="{{$end_year->id}}" class="d-none">
                                <div class="form-group">
                                    <label for="grade">Жылдық баға</label>
                                    <input type="number" name="grade" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
