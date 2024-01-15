<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="slycoder, web dev, web development, javascript, laravel, vue">
    <meta name="author" content="Carlos Ramirez">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
         
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/webapps">Apps</a></li>
                    <li class="nav-item"><a class="nav-link" href="/resources">Resources</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            @if(Auth::user()->hasRole('SLY_ADMIN'))
                            <a class="dropdown-item" href="/admin">- Admin</a>
                            @endif
                            @if(Auth::user()->hasRole('SLY_SUPERADMIN'))
                            <a class="dropdown-item" href="/superadmin">- Super Admin</a>
                            @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
       
        </nav>

        <main class="py-4">

            <section class="set1 card">

            @include('inc.messages')

            <article class="block1 card-header row">
                <div class="col-12">
            <!-- if parameter exists, check value -->
            @php
            if(isset($_GET['rose'])) {
                if($_GET['rose']==1) {
                    $rose=0;
                } else {
                    $rose=1;
                }
                } else {
                    $rose=1;
                }
            
            @endphp
                    <a href="/webapps/dance?rose={{$rose}}" class="btn btn-primary {{ Request::is('webapps/dance') ? 'active' : '' }}" aria-pressed="true" role="button" >
            @php
                if($rose==1) {
                    echo "Showing [ALL] / Rose&nbsp;Favs";
                } else {
                    echo "Showing All / [ROSE&nbsp;FAVS]";
                }
            
            @endphp
            
            
                    </a>
                    <a href="/webapps/dance/songlist" class="btn btn-primary {{ Request::is('webapps/dance/songlist') ? 'active' : '' }}" aria-pressed="true" role="button">
                    Song List
                    </a>
            
            
                    <button type="button" class="btn btn-primary col-md-4 col-sm-12">
                    <form action="/webapps/dance/search", method="GET">
                    <input placeholder="Search" name="search" style="width:200px" value='{{ request()->search}}'>
                    <img src="{{asset('images/magglass.png')}}" height="18px">
                    </form>
                    </button>
                </div>
            
            
            </article>
            
            <h3 class="col-12">{{$title}}</h3>

            @yield('content')

        </section>
        </main>

        <footer-component></footer-component>
    </div>
</body>
</html>
