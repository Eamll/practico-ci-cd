<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'puesto',
        'fecha_contratacion',
        'salario',
        'email',
        'telefono',
        'departamento',
    ];
}
