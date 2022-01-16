<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    public $fillable = [
        "fecha",
        "iva",
        "costo_envio",
        "total",
    ];
}
