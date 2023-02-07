<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cey-Nor') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Cey-Nor') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ 'home' == request()->path() ? 'active' : '' }}" href="{{ route('home') }}">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 'admin/gallery' == request()->path() ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 'admin/projects' == request()->path() ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 'admin/fishingboats' == request()->path() ? 'active' : '' }}" href="{{ route('fishingboats') }}">Fishing Boats</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 'admin/passengerboats' == request()->path() ? 'active' : '' }}" href="{{ route('passengerboats') }}">Passenger Boats</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Other Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 'admin/news-feeds' == request()->path() ? 'active' : '' }}" href="{{ route('news&feeds') }}">News & Feeds</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Tenders / Vacancies</a>
                        </li>

                        
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                        <li class="nav-item">
                            <a class="nav-link"  v-pre>
                            Hello !!    {{ Auth::user()->name }}
                            </a>
                            
                        </li>

                        &nbsp;&nbsp;&nbsp;

                        <li class="nav-item">
                           
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
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
        @yield('scripts')
    </div>
</body>
</html>
