<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZonaSegura extends Model
{
    protected $table = 'zona_seguras';

    protected $fillable = [
        'nombre',
        'activa',
        'tipo',
        'descripcion',
        'latitud',
        'longitud',
        'radio_metros',
    ];

    protected $casts = [
        'latitud' => 'float',
        'longitud' => 'float',
        'radio_metros' => 'integer',
        'activa' => 'boolean',
    ];
}
