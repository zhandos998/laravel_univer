@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img class="img-fluid rounded w-100 img_style" src="{{ asset('storage/images/teacher_home.jpg') }}" alt="">
            <div class="card">
                <div class="card-header">{{ Auth::user()->roles[0]->name }}</div>

                <div class="card-body">
                    {{-- @if (!is_null($group))
                        <a href="/teacher/view_group/{{$group->id}}"><button type="button" class="btn btn-outline-dark">Сыныбымды қарау</button></a>
                    @endif --}}
                    <a href="/teacher/timetable"><button type="button" class="btn btn-outline-dark">Сабақ кестесі</button></a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Жаңалықтар</div>

                <div class="card-body">
                    <div class="d-none">{{$i=0;}}</div>
                    @foreach ($news as $new)
                    <p class="d-grid gap-2 mb-0">
                      <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$i}}" aria-expanded="false" aria-controls="collapseExample">
                          <div class="row">
                              <div class="w-50" style="text-align: left;">{{$new->title}}</div>
                              <div class="w-50" style="text-align: right;">{{$new->created_at}}</div>
                          </div>
                      </button>
                    </p>
                    <div class="collapse" id="collapse_{{$i++}}">
                      <div class="card card-body">
                          {{$new->discription}}
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
