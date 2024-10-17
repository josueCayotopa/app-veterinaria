<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'cita_id',
        'empresa_id',
        'subtotal',
        'impuesto',
        'descuento',
        'total',
        'fecha_pago',
        'estado',
        'metodo_pago',
    ];

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);}

}
