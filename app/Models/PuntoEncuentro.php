<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuntoEncuentro extends Model
{
    protected $table = 'punto_encuentros';

    protected $fillable = [
        'nombre',
        'descripcion',
        'latitud',
        'longitud',
        'activa',
    ];

    protected $casts = [
        'latitud' => 'float',
        'longitud' => 'float',
        'activa' => 'boolean',
    ];
}
