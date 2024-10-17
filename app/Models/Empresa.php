<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'ruc',
        'razon_social',
        'direccion_legal',
        'numero_celular',
        'correo',
        'nombre_representante_legal',
    ];

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

}
