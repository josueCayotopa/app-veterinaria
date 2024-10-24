<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_documento',
        'dni',
        'nombres',
        'apellidos',
        'celular',
        'email',
        'direccion',
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }

}
