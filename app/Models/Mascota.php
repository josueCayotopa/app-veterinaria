<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'tipo_mascota',
        'raza',
        'peso',
        'sexo',
        'edad',
        'descripcion',
        'alergias',
        'cirugias',
        'cliente_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }

}
