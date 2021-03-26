<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanitizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cliente_id',
        'nombrecliente',
        'servicio',
        'area',
        'fechainicio',
        'fechafin',
        'estatus'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
