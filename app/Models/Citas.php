<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'cliente_id',
        'mascota_id',
        'servicio_id',
        'medico_id',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function servicio()
    {
        return $this->belongsTo(ServicioVeterinario::class, 'servicio_id');
    }

    public function medico()
    {
        return $this->belongsTo(MedicoVeterinario::class, 'medico_id');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);}

}
