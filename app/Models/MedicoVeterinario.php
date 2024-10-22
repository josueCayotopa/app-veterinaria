<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoVeterinario extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'celular',
        'email',
        'direccion',
        'numero_de_colegiatura',
        'especializacion',
        'universidad',
        'profesion',
        'telefono_emergencia',
        'disponibilidad',
        'tipo_contrato',
    ];

    public function citas()
    {
        return $this->hasMany(Citas::class, 'medico_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horarios::class, 'medico_id');

    }

}
