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
            background-color: #EEEB1B;
        }

        .nav-item {
            margin-left: 3px;
            margin-right: 3px;
        }

        .btn-blue {
            background-color: #f12d49;
            color: #fff;
            font-size: 16px;
            padding: 0.6rem;
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

        .brand img {
            width: 250px;
            height: auto;
        }

        .admin {
            width: 50px;
            height: auto;
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div id="app" class="app">
        <nav class="navbar navbar-expand-md fond bg-yellow navbar-light shadow-sm">
            <div class="container">
                <a href="/admin" class="admin"><img class="admin" src="{{ asset('images/logo_admin.png') }}" alt="logo_admiin"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/admin/productos" class="nav-link btn btn-blue bton btn-danger">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/categorias" class="nav-link btn btn-blue bton btn-danger">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link btn btn-blue bton btn-danger">Volver al menu principal</a>
                        </li>
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





