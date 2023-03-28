<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombreProducto',
        'descripcion',
        'precio',
        'image',
        'id_categorias'
    ];

    public function categorias()
    {
        return $this->hasMany(Categorias::class);
    }
    public function carritos()
    {
        return $this->belongsToMany(Carrito::class);
    }
}
