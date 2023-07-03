@extends('layouts.admin')

@section('content')
<style>
    body {
        background-color: #e7e7e7;
        margin: 0;
        padding: 0;
    }

    .d-flex.justify-content-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .card-body {
        background-color: #f1f1f1;
        padding: 15px;
        text-align: center;
    }
    
    .imgn {
        max-width: 100%;
        max-height: 380px;
        padding: 40px;
    }

    .text-center {
        font-size: 1.7rem;
        margin-top: 5px;
        margin-bottom: 25px;
    }
</style>
<body>
    <div class="container">
        <div class="text-center">
            <strong>Bienvenido/a al apartado de administración</strong>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card mb-3 shadow-sm">
                    <a href="/admin/categorias">
                        <div class="text-center">
                            <img class="imgn" src="{{ asset('images/categorias.png') }}">
                        </div>
                    </a>
                    <div class="card-body">
                        <h2 class="card-text" style="font-size: 1.4rem;">Administrar categorías de productos</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mb-3 shadow-sm">
                    <a href="/admin/productos">
                        <div class="text-center">
                            <img class="imgn" src="{{ asset('images/producto.png') }}">
                        </div>
                    </a>
                    <div class="card-body">
                        <h2 class="card-text" style="font-size: 1.4rem;">Administrar productos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection


