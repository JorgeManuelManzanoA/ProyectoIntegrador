<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function showByTipo($tipo)
    {
        $productos = Producto::where('tipo', $tipo)->get();
        return view('productos.showByTipo', compact('productos'));
    }

    public function Tipos(){
        return $this->belongsTo(Tipo::class);
    }
}

