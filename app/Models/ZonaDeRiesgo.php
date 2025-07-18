<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZonaDeRiesgo extends Model
{
    protected $table = 'zona_de_riesgos';

    protected $fillable = [
        'nombre',
        'activa',
        'tipo',
        'descripcion',
        'coordenadas',
    ];

    protected $casts = [
        'coordenadas' => 'array',
        'activa' => 'boolean',
    ];
}
