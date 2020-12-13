<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";

    protected $fillable = [
        "nombre",
        "documento_id",
        "tipo_doc",
        "direccion",
        "telefono"
    ];

    public function ordenes()
    {
        return $this->hasMany(Orden::class, "cliente_id");
    }
}
