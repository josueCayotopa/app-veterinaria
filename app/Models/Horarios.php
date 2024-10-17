<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'medico_id',
        'hora_inicio',
        'hora_fin',
        'dia_semana',
    ];

    public function medico()
    {
        return $this->belongsTo(MedicoVeterinario::class, 'medico_id');
    }

}
