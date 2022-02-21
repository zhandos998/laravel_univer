@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    Мұғалім: {{$teacher->name}}<br>
                    Пән: {{$subject->name}}<br>
                    Бағалар:<br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Баға</th>
                            <th scope="col">Дата</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($grades as $grade)
                            <tr>
                                <th>{{$grade->grade}}</th>
                                <td>{{date_format(date_create($grade->created_at), 'd.m.Y')}}</td>
                            </tr>
                    @endforeach
                    
                        </tbody>
                    </table>

                    @if (!is_null($quarter_grade))
                        Тоқсандық баға: {{$quarter_grade->grade}}<br>
                    @endif

                    @if (!is_null($year_grade))
                        Жылдық баға: {{$year_grade->grade}}<br>
                    @endif
                    Менің документтерім:<br>
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Документ</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($my_documents as $my_document)

                                <tr>
                                    <th>{{$my_document->id}}</th>
                                    <td><a href="{{ asset($my_document->document) }}" download>{{$my_document->document}}</a></td>
                                </tr>
                            @endforeach
                    
                        </tbody>
                    </table>
                    
                    Мұғалімнің документтері:<br>
                    
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
                                    <th>{{date_format(date_create($document->date_from), 'd.m.Y')}}</th>
                                    <td><a href="{{ asset($document->document) }}" download>{{$document->document}}</a></td>
                                </tr>
                            @endforeach
                        
                            </tbody>
                        </table>
                    <a href="/student/add_document/subject_{{$subject->id}}/teacher_{{$teacher->id}}"><button type="button" class="btn btn-outline-dark">Документ қосу</button></a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
