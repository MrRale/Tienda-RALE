<?php

namespace App\Models;

use App\Models\DetallePedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;
    public $fillable=[
        "fecha",
        "descripcion",
        "precio",
        "ciudad",
        "costo_envio",
        "direccion",
        "empresa",
        "cantidad",
        "estado_pedido",
        "user_id",
        "factura_id",
        "total"
    ];


    public function detalle_pedidos(){
        return $this->hasMany(DetallePedido::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
