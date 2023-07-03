@extends('layouts.admin')

@section('content')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body {
            background-color: #e7e7e7;
        }
        .list-group-item {
            background-color: #f1f1f1;
            font-size: 0.9rem;
            border: none; 
        }

        .list-group {
            margin-top: 1.5rem;
        }
        .list-group-item > .row > div {
            padding: 10px 0;
            text-align: center;
        }
        .nom {
            font-size: 1.4rem;
            margin-top: 1rem;
            margin-bottom: 1.2rem;
        }

        .card-body, th, td, .table {
            background-color: #f1f1f1;
            --bs-table-bg: #f1f1f1;
        }

        .form {
            margin-top: 0.7rem;
            display: flex;
            margin-bottom: 0.7rem;
            font-size: 1rem;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .form-container,
        .list-container {
            flex-basis: 100%;
            padding: 15px;
        }

        @media (min-width: 768px) {
            .form-container,
            .list-container {
                flex-basis: 50%;
            }
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus,
        input[type="file"]:focus {
            border-color: #EA8181;
            box-shadow: 0 0 0 0.2rem #EA8181;
        }

        .text-card {
            font-size: 0.75rem;
            justify-content: center;
            align-items: center;
        }

        .list-group-item:not(:first-child) {
            border-top: 1px solid #ced4da;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4 card-body shadow-sm form-container center center-content">
                    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <h1 class="nom text-center">Ingreso de productos</h1>
                            <label class="form" for="tipoIngreso">Categoria del producto:</label>
                            <select id="tipoIngreso" class="form-control form" name="tipo" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)">
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->nombre_tipo }}">{{ $tipo->nombre_tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form" for="nombre">Nombre:</label>
                            <input type="text" class="form-control form" id="nombre" name="nombre" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)">
                        </div>
                        <div class="form-group">
                            <label class="form" for="precio">Precio:</label>
                            <input type="text" class="form-control form" id="precio" name="precio" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)" pattern="[0-9]+(\.[0-9]+)?" title="Ingrese un número decimal válido (por ejemplo, 12.34)">
                        </div>
                        <div class="form-group">
                            <label class="form" for="descripcion">Descripción:</label>
                            <textarea class="form-control form" id="descripcion" name="descripcion" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form" for="imagen">Imagen:</label>
                            <input type="file" class="form-control form" id="imagen" name="imagen" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)">
                        </div>
                        <div class="center">
                            <button type="submit" class="btn btn-danger form">Agregar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card mb-4 card-body shadow-sm col-md-12">
                <div class="list-container">
                    <h1 class="nom text-center">Listado de productos</h1>
                    <form>
                        <div class="form-group">
                            <label class="form" for="tipo">Seleccione la categoria:</label>
                            <select id="tipo" class="form-control" name="tipo" onchange="filterProducts(this.value)" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)">
                                <option value="">Mostrar Todos</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->nombre_tipo }}">{{ $tipo->nombre_tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <ul class="list-group align-middle" id="productos-list">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-1"><strong>Item</strong></div>
                                <div class="col-md-2"><strong>Nombre</strong></div>
                                <div class="col-md-1"><strong>Precio</strong></div>
                                <div class="col-md-3"><strong>Descripción</strong></div>
                                <div class="col-md-2"><strong>Tipo</strong></div>
                                <div class="col-md-1"><strong>Imagen</strong></div>
                                <div class="col-md-2"><strong>Acciones</strong></div>
                            </div>
                        </li>
                        @foreach ($productos as $index => $producto)
                            <li class="list-group-item" data-tipo="{{ $producto->tipo }}">
                                <div class="row">
                                    <div class="text-card col-md-1">{{ $index + 1 }}</div>
                                    <div class="text-card col-md-2">{{ $producto->nombre }}</div>
                                    <div class="text-card col-md-1">S/.{{ $producto->precio }}</div>
                                    <div class="text-card col-md-3">{{ $producto->descripcion }}</div>
                                    <div class="text-card col-md-2">{{ $producto->tipo }}</div>
                                    <div class="text-card col-md-1">
                                        @if ($producto->imagen)
                                            <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" width="100">
                                        @else
                                            No disponible
                                        @endif
                                    </div>
                                    <div class="text-card col-md-2">
                                        <form method="POST" action="{{ route('productos.destroy', $producto->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function filterProducts(tipo) {
            const productosList = document.getElementById('productos-list');
            const productos = productosList.getElementsByClassName('list-group-item');

            for (let i = 0; i < productos.length; i++) {
                const producto = productos[i];
                const productoTipo = producto.getAttribute('data-tipo');
                
                if (tipo === '' || productoTipo === tipo) {
                    producto.style.display = 'block';
                } else {
                    producto.style.display = 'none';
                }
            }

            const columnas = productosList.querySelector('.list-group-item:first-child');
            columnas.style.display = 'block';
        }
        function changeBorderColor(element) {
            element.style.borderColor = '#EA8181';
            element.style.boxShadow = '0 0 0 0.2rem #EA8181';
        }
        
        function resetBorderColor(element) {
            element.style.borderColor = '';
            element.style.boxShadow = '';
        }
    </script>
@endsection
