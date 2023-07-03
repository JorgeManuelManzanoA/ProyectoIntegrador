<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function Productos(){
        return $this->hasMany(Producto::class);
    }
}