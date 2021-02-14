<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre_rs',
        'cedula_rif',
        'direccion',
        'email',
        'telefono1',
        'telefono2'
    ];

    public function sanitizaciones()
    {
        return $this->hasMany(Sanitizacion::class);
    }
}
