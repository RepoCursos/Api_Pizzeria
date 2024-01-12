<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;
    public $timestamps =  false;
    
    protected $fillable = [
        'nombre',
        'precio',
        'producto_id'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
