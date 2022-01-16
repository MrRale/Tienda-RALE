<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    public $fillable =[
        "id",
        "cedula",
        "ruc",
        "telefono",
        "nombres",
        "apellidos",
        "email",
        "fecha",
        "descripcion",
        "cantidad",
        "total",
        "estado_pedido",
        "empresa",
        "ciudad",
        "codigopostal",
        "direccion",
        "costo_envio",
        "user_id",
        "factura_id",
    ];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function detalle_ordenes(){
        return $this->hasMany(DetalleOrden::class);
    }

}
