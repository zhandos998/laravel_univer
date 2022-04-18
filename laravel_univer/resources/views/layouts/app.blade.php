<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Мектеп жүйесі') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        tr{
            vertical-align: middle;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="border-radius: 50%;width: 40px;" src="{{asset('logo.jpeg')}}" alt="{{ config('app.name', 'Мектеп жүйесі') }}">
                    {{-- {{ config('app.name', 'Мектеп жүйесі') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::user() && Auth::user()->roles[0]->id==2)
                            <li class="nav-item"><a class="nav-link" href="/admin/users">Қолданушылар</a></li>
                            <li class="nav-item"><a class="nav-link" href="/admin/subjects">Пәндер</a></li>
                            <li class="nav-item"><a class="nav-link" href="/admin/groups">Сыныптар</a></li>
                            <li class="nav-item"><a class="nav-link" href="/admin/news">Жаңалықтар</a></li>
                            <li class="nav-item"><a class="nav-link" href="/admin/add_quarter">Тоқсан қосу</a></li>
                            <li class="nav-item"><a class="nav-link" href="/admin/add_year">Оқу жылын қосу</a></li>
                        @elseif (Auth::user() && Auth::user()->roles[0]->id==1)
                            {{-- @if (!is_null($group))
                                <li class="nav-item"><a class="nav-link" href="/teacher/view_group/{{$group->id}}">Сыныбымды қарау</a></li>
                            @endif --}}
                            <li class="nav-item"><a class="nav-link" href="/teacher/timetable">Сабақ кестесі</a></li>
                        @elseif (Auth::user() && Auth::user()->roles[0]->id==3)
                            <li class="nav-item"><a class="nav-link" href="/student/timetable">Сабақ кестесі</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Кіру') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <p class="nav-link mb-0">
                                    {{ Auth::user()->roles[0]->name }}
                                </p>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Шығу') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
