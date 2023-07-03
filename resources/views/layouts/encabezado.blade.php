<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Online Shop</title>
    <link rel="icon" href="{{ asset('images/logo_pagina.png') }}" type="image/png">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Arial';
        }

        .bg-yellow {
            background-color: #f6f317;
        }

        .nav-item {
            margin-left: 3px;
            margin-right: 3px;
        }

        .btn-blue {
            background-color: #f12d49;
            color: #fff;
            font-size: 16px;
            padding: 0.5rem;
            border: none;
            border-radius: 0.25rem;
            text-decoration: none;
            margin-right: 1rem;
            cursor: pointer;
        }

        .btn-blue:active {
            background-color: #c61f3b;
        }
        
        .btn-blue:hover,
        .btn-blue:focus {
            color: #fff;
            background-color: #e82944;
        }

        .dropdown {
            background-color: #f12d49;
            position: relative;
            display: inline-block;
            border-radius: 0.25rem;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            width: 100%;
            background-color: #f12d49;
            padding: 0;
            border-radius: 0.25rem;
            overflow: hidden;
            z-index: 1;
        }

        .dropdown.active .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropdown-content,
        .dropdown-content:hover {
            background-color: #e82944;
        }

        .dropdown-button {
            background-color: #f12d49;
            color: #fff;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .dropdown-content a {
            display: block;
            padding: 8px 16px;
            color: #fff;
            text-decoration: none;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            clear: both;
            font-weight: 400;
            color: #fff;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-toggle::after {
            display: inline-block;
            color: #fff;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }

        .dropdown-menu.show {
            display: block;
            color: #fff;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            min-width: 10rem;
            padding: .5rem 0;
            margin: .125rem 0 0;
            font-size: 1rem;
            color: #fff;
            text-align: left;
            list-style: none;
            background-color: #f12d49;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: .25rem;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #fff;
            text-decoration: none;
            background-color: #C61F3B;
        }
        .brand img {
            width: 250px;
            height: auto;
            margin: 0px;
        }

        .brands img {
            justify-content: center;
            align-items: center;
            width: 1px;
            height: auto;
            padding: 20px;
            padding-right: 40px;
            padding-left: 40px;
            background-color: #f6f317;
            margin-left: 10px;
            margin-right: 10px;
        }

        .enc  {
            margin: 0px;
        }
    </style>
</head>
<body>
    <div id="app" class="app">
        <nav class="navbar navbar-expand-md bg-yellow navbar-light shadow-sm">
        <a href="admin" class="brands"><img src="{{ asset('images/logo_pagina.png') }}" alt="logo_pagina"></a>
            <div class="enc container">
                <a href="/" class="brand"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-blue btn btn-danger" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-blue btn btn-danger" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-blue btn btn-danger" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.querySelector('.dropdown');
            var dropdownButton = document.querySelector('.dropdown-button');
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownButton.addEventListener('click', function() {
                dropdown.classList.toggle('active');
            });
            dropdown.addEventListener('mouseleave', function() {
                dropdown.classList.remove('active');
            });
            var buttons = document.querySelectorAll('.btn-blue');
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    button.classList.add('dark');
                });
            });
        });
    </script>
</body>
</html>



