@extends('layouts.encabezado')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body {
            background-color: #e7e7e7;
        }

        .card-body {
            background-color: #f1f1f1;
            font-size: 0.9rem;
        }

        .nom {
            font-size: 1.4rem;
        }
        .card-text {
            font-size: 1.2rem;
            margin-top: 6px;
            margin-bottom: 11px;
        }

        .card {
            height: 420px;
        }

        .bton {
            font-size: 0.9rem;
        }

        .name {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70px;
        }

        .card img {
            padding: 20px;
            transition: opacity 0.3s ease-in-out;
        }

        .card img:hover {
            filter: brightness(55%);
        }
    </style>
</head>
<main>
    <div class="container">
        <div class="row">
            @foreach($productos as $producto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ route('productos.show', [$producto->tipo, $producto->nombre]) }}">
                        <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" width="100%" height="280">
                    </a>
                    <div class="card-body">
                        <div class="name">
                            <h2 class="text-center nom">{{ $producto->nombre }}</h2>
                        </div>
                        <div class="price">
                            <p class="card-text text-center">Precio: S/.{{ $producto->precio }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection

