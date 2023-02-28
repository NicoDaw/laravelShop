<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = [
        'nombreCategoria'
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }
}
