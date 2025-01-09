<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // protected $table = 'tbl_producto';
    // protected $idPrimary = 'id_producto';

    protected $fillable = [
        'codigoProducto',
        'descripcionProducto',
        'precioProducto',
        'estado'
    ];
}
