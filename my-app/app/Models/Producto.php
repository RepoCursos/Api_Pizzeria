<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'nombre',
        'descripcion',
        'urlfoto',
        'precio',
        'stock',
        'presentacion',
        'publicado',
        'orden',
        'visitas',
        'portada',
        'categoria_id'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function precios(){
        return $this->hasMany(Precio::class);
    }
}
