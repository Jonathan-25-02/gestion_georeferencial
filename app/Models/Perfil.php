<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitud',
        'longitud',
        'foto_perfil',
        'instagram',
        'facebook',
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
