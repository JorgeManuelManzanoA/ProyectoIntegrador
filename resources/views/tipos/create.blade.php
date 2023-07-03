@extends('layouts.admin')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body {
            background-color: #e7e7e7;
        }
        .form-group {
            font-size: 1rem;
            margin-top: 10px;
            margin-bottom: 7px;
        }

        .card-body, th, td, .table {
            background-color: #f1f1f1;
            --bs-table-bg: #f1f1f1;
        }

        .nom {
            font-size: 1.4rem;
            margin-top: 1rem;
            margin-bottom: 1.2rem;
        }
        
        .form {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #EA8181;
            box-shadow: 0 0 0 0.2rem #EA8181;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h1 class="nom text-center">Ingreso de categorias de productos</h1>
                        <form action="{{ route('tipos.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form">
                                <label class="form" for="nombre_tipo">Nombre de la categoria:</label>
                                <input type="text" name="nombre_tipo" class="form-control form" required>
                            </div>
                            <div class="form-group form">
                                <label for="imagen">Imagen:</label>
                                <input type="file" name="imagen" class="form-control form" required>
                            </div>
                            <div class="center form">
                                <button type="submit" class="btn btn-danger form">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('delete_success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('delete_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h2 class="nom text-center">Listado de categorias</h2>
                        <table class="table form-group align-middle">
                            <thead>
                                <tr class=>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $index => $tipo)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $tipo->nombre_tipo }}</td>
                                        <td>
                                            @if ($tipo->imagen)
                                                <img src="{{ asset('images/'.$tipo->imagen) }}" alt="Imagen del Tipo" width="100">
                                            @else
                                                No disponible
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
