<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory; // Asegúrate de tener esto aquí
    
    protected $fillable = [
        'nombres', 
        'apellidos', 
        'email', 
        'telefono', 
        'direccion', 
        'fecha_registro', 
        'tipo_documento', 
        'numero_documento',
    ];
}

