<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Inventario;
use App\Models\DetallePedido;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use  Rateable;
    
    public $fillable = [
        "id",
        "nombre",
        "marca",
        "stock",
        "precio",
        "descripcion",
        "codigo",
        "medida",
        "inventario_id",
        "categoria_id",
    ];


   

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // public function detallePedido()
    // {
    //     return $this->belongsTo(DetallePedido::class);
    // }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function inventario(){
        return $this->belongsTo(Inventario::class);
    }
//             SCOPES O FILTROS DE BUSQUEDA PERSONALIZADOS PARA EL MODELO DE PRODUCTO
    public function scopeNombres($query, $nombre){
        if($nombre){
            return $query->where('nombre','like','%'.$nombre.'%');
        }
    }

    public function scopeCodigos($query, $codigo){
        if($codigo){
            return $query->where('codigo','like','%'.$codigo.'%');
        }
    }

    public function scopeCategorias($query, $categoria){
        if($categoria){
            return $query->where('categoria_id','=',$categoria);
        }
    }
//-----PARA OBTENER LOS PRODUCTOS CON MISMA CATEGORIA PERO DIFERENTE ID (PRODUCTOS RELACIONADOS)---//
    public static function similar($producto){
        
            $producto =  Producto::where([['categoria_id','=',$producto->categoria_id],['id','!=',$producto->id]])->get();
            
            return $producto;
        }
//------------------------------------------------------------------------------------------------//

    public function scopePrecios($query, $precio){
        if($precio){
            return $query->where('precio','=',$precio);
        }
    }
}
