<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla

    protected $primaryKey = 'id_producto'; // Clave primaria

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria',
        'stock',
        'fecha_creacion',
        'estado',
    ];

    public $timestamps = false; // Desactiva las marcas de tiempo automática
}
