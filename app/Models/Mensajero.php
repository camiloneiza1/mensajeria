<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajero extends Model
{
    use HasFactory;

    protected $table = "mensajero";

    protected $fillable = [
        "nombre",
        "apellido",
        "documento_id",
        "email",
        "fecha_nacimiento"
    ];

    public function ordenes()
    {
        return $this->hasMany(Orden::class, "mensajero_id");
    }

}
