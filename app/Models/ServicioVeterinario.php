<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioVeterinario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'tipo_servicio',
        'estado',
    ];

    public function citas()
    {
        return $this->hasMany(Citas::class, 'servicio_id');
    }

}
