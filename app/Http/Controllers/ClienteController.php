<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Factura;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ShoppingCart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class ClienteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('cliente');
    // }

    public function perfil(){
        $cliente = User::findOrFail(Auth::id());
        $pedidos = Pedido::where('user_id',Auth::id())->get();  
        return view('paginas.perfil',compact('cliente','pedidos'));
    }

    public function actualizarPerfil(Request $request){
        $user_id = auth::id();
        $user = User::find($user_id);

        
        if($request['password_nueva_confirm'] != $request['password_nueva'])
            return back()->with('mensaje','Asegurese de que las contraseñas sean iguales');
     
            $passnueva = $request['password_nueva'];
            $passnueva = Hash::make($passnueva);
            $user->update([
            "name"=>$request['name'],
            "cedula"=>$request['cedula'],
            "telefono"=>$request['telefono'],
            "direccion"=>$request['direccion'],
            "empresa"=>$request['empresa'],
            "email"=>$request['email'],
            "password"=>$passnueva
        ]);

        return back();
    }

    public function pdfPedido($id){
        $band=false;
        $user_id = Auth::id();
        $cliente = User::find($user_id);
        $pedido = Pedido::find($id);
        $pedidosuser = Pedido::where('user_id',$user_id)->get(); //todos los pedidos de este user
      
        foreach($pedidosuser as $pu){
            if($pu->id == $id){
                $band=true;
            }
        }
        if($band==false){
            return redirect()->route('home.index')->with('mensaje','Comprobante no encontrado');
        }

       $pedidos =  $pedido->detalle_pedidos()->get();
        // dd($user_id);
        
        $orden = Pedido::find($id);          
        $pdf = PDF::loadView('pdf.cliente.pedidos', compact('pedido','pedidos','cliente'));
        return $pdf->stream('pedido.pdf');
    }

    public function pasarela(){
        $cliente_id = auth::id();
        $cliente = User::find($cliente_id);

        return view('paginas.pasarela',compact('cliente'));
    }

   

    public function pagar(Request $request){
 
        $campos = [
            'empresa' => 'max:40',
            'direccion' => 'required',
            'ciudad' => 'required|string|max:35',
            'direccion' => 'required|String|max:100',
        ];
        $mensaje = [
            'ciudad.required'=>'La ciudad es requerida',
            'ciudad.max'=>'El nombre de la ciudad es muy extenso',
            'empresa.max' => 'El nombre de la empresa es muy extenso',
            'direccion.required' => 'La dirección es requerida',
            'direccion.max' => 'La dirección es muy extensa',           
        ];
        $this->validate($request, $campos, $mensaje);

        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();

//CREACION DE LA FACTURA QUE CONTENDRA EL PEDIDO EN CUESTION
        $factura = Factura::create([
            "fecha"=>Carbon::now(),
            "total"=>$shopping_cart->total_precios()
        ]);

//CREACION DEL PEDIDO
// dd($request['ciudad']);
        $pedido = Pedido::create([
            "fecha"=>Carbon::now(),//bien
            "descripcion"=>$request['descripcion'],
            // "precio"=>$shopping_cart->total_precios(),
            "cantidad"=> $shopping_cart->cantidad_de_productos(),
            "total"=>$shopping_cart->total_precios(),
            "estado_pedido"=>"pendiente",//por default tambien es pendiente
            "empresa"=>$request['empresa'],
            "ciudad"=>"flkadfla",
            "direccion"=>$request['direccion'],
            "costo_envio"=>5,//luego lo hacemos dinamico
            "user_id"=>Auth::id(),
            "factura_id"=>$factura->id
        ]);
//CREACION DE LOS DETALLES DEL PEDIDO 
        foreach($shopping_cart->shopping_cart_details as $scd){
            DetallePedido::create([
                "cantidad"=>$scd->cantidad,
                "precio"=>$scd->precio,
                "producto_id"=>$scd->producto_id,
                "pedido_id"=>$pedido->id,
            ]);
        }
           $shopping_cart->delete(); //vaciamos o eliminamos el carrito al ya realizar el pedido
            return redirect()->route('cliente.perfil')->with('mensaje','Pedido realizado con exito'); //regresamos a la pagina anterior

    }

    public function comentar(Request $request, Producto $producto){
       $rating =  $producto->rate($request['valoracion'], $request['comentario']);
        // $producto->comment($request['comentario']);
        return back()->with('mensaje','Comentario agregado al anuncio.');
    }

    
}
