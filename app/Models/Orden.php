<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = "orden";

    protected $fillable = [
        "cliente_id",
        "mensajero_id",
        "direccion_origen",
        "direccion_destino",
        "fecha_hora",
        "costo"
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, "cliente_id");
    }

    public function mensajero()
    {
        return $this->belongsTo(Mensajero::class, "mensajero_id");
    }
}
