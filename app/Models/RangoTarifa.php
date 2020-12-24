<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangoTarifa extends Model
{
    use HasFactory;

    protected $table = "rangos_tarifas";

    protected $fillable = [
        "km_ini",
        "km_fin",
        "costo",
    ];
}
