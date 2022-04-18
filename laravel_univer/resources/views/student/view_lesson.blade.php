@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/student_lesson.png') }}" alt="">

            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">

                    <h1 class="display-3">{{$teacher->name}}</h1>
                    <p><small>{{$teacher->email}}<br>{{$subject->name}}</small></p>

                    <h3> Бағалар:</h3>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Баға</th>
                            <th scope="col">Дата</th>
                          </tr>
                        </thead>
                        <tbody>
                    @if (count($grades)>0)
                        @foreach ($grades as $grade)
                                <tr>
                                    <th>{{$grade->grade}}</th>
                                    <td>{{date_format(date_create($grade->created_at), 'd.m.Y')}}</td>
                                </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="2" class="text-center">Бағалар әзірге жоқ</td>
                    </tr>
                    @endif

                        </tbody>
                    </table>

                    @if (!is_null($quarter_grade))
                    <h3> Тоқсандық баға:</h3>
                     {{$quarter_grade->grade}}<br>
                    @endif

                    @if (!is_null($year_grade))
                    <h3> Жылдық баға:</h3>
                     {{$year_grade->grade}}<br>
                    @endif

                    <h3> Мұғалімнің документтері:</h3>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 5%">#</th>
                            <th scope="col">Орындалу уақыты</th>
                            {{-- <th scope="col">Тақырыбы</th> --}}
                            <th scope="col">Документ</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($documents)>0)
                                @foreach ($documents as $document)
                                    <tr>
                                        <th>{{$document->id}}</th>
                                        <th>{{date_format(date_create($document->date_from), 'd.m.Y')}}</th>
                                        {{-- <th>{{$document->title}}</th> --}}
                                        <td><a href="{{ asset($document->document) }}" download>{{$document->title}}</a></td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="100%" class="text-center">Документтер әзірге жоқ</td>
                            </tr>
                            @endif

                            </tbody>
                        </table>

                        <h3>Менің документтерім:</h3>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 5%">#</th>
                            <th scope="col">Документ</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($my_documents)>0)
                                @foreach ($my_documents as $my_document)
                                    <tr>
                                        <th>{{$my_document->id}}</th>
                                        <td><a href="{{ asset($my_document->document) }}" download>{{$my_document->title}}</a></td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="100%" class="text-center">Документтер әзірге жоқ</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <a href="/student/add_document/subject_{{$subject->id}}/teacher_{{$teacher->id}}"><button type="button" class="btn btn-outline-dark">Документ қосу</button></a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
