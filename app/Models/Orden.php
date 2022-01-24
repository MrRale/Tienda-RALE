<?php

namespace App\Models;

use App\Models\ControlOrden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        "direccion",
        "costo_envio",
        "vendedor_id",
        "user_id",
        "factura_id",
        "saldo"
    ];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function detalle_ordenes(){
        return $this->hasMany(DetalleOrden::class);
    }

    public function control_orden(){
        return $this->hasOne(ControlOrden::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
