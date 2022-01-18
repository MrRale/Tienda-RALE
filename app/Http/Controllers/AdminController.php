<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use App\Models\Orden;
use App\Models\Cuenta;
use App\Models\Pedido;
use App\Models\Factura;
use App\Models\DetalleOrden;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\ControlCuenta;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
 
    public function index()
    {
       return view('paginas.admin.dashboard');
    }

    public function pedidos(){
        $pedidos = Pedido::paginate(2);
        return view('paginas.admin.pedidos.index', compact('pedidos'));
    }

    public function pedidosVendedor(){
        $ordenes = Orden::paginate(2);
        // dd($ordenes);
        return view('paginas.admin.pedidos.pedidosvendedor', compact('ordenes'));
    }

    public function ventasByMiembro($id){
        $ventas = Orden::where('user_id',$id)->get();
        $vendedor = User::find($id);
        
        return view('paginas.admin.miembro.ventasByMiembro',compact('ventas','vendedor'));
    }

    public function verAbonos(){
        $clientes =  User::role(['Cliente'])->get();
        return view('paginas.vendedor.clientes.abonos',compact('clientes'));
    }

    public function abonosByCliente(Request $request){
        
        $cliente = User::find($request->cliente_id);
        foreach($cliente->cuentas as $cuenta){
            if($cuenta->id == $request->cuenta_id){
                $abonos = Abono::where('cuenta_id',$cuenta->id)->get();
            }
        }
     return view('paginas.vendedor.clientes.abonosByCliente',compact('abonos','cliente'));
    }

    public function showPedido(Pedido $pedido){
        $pedidos = $pedido->detalle_pedidos()->get();
        $cliente = $pedido->user;
        // dd($cliente);
        return view('paginas.admin.pedidos.show', compact('pedido','pedidos','cliente'));
    }

    public function showPedidoVendedor($id){
        $orden = Orden::find($id);
        $ordenes = $orden->detalle_ordenes()->get();
        $vendedor = $orden->user;
        return view('paginas.admin.pedidos.showvendedor', compact('orden','ordenes','vendedor'));
    }

    public function cambiarEstadoPedido($id){
        $pedido = Pedido::find($id);
        if($pedido->estado_pedido=="pendiente"){
            $pedido->update(["estado_pedido"=>"enviado"]);
        }else{
            $pedido->update(["estado_pedido"=>"pendiente"]);
        }
        
        Alert::toast('Pedido cambiado de estado', 'success');
        return back();
    }

    public function cambiarEstadoOrden($id){
        $orden = Orden::find($id);
        if($orden->estado_pedido=="pendiente"){
            $orden->update(["estado_pedido"=>"enviado"]);
        }else{
            $orden->update(["estado_pedido"=>"pendiente"]);
        }
        
        Alert::toast('Orden cambiada de estado', 'success');
        return back();
    }

    public function agregarMiembro(){
        // dd("hola");
        $roles = Role::whereNotIn('name', ['Cliente'])->get();
      
        return view('paginas.admin.miembro.agregar', compact('roles'));

    }

    public function guardarMiembro(Request $request){
        $rol = Role::find($request['rol_id']);
        $passwordHashed = Hash::make($request['password']);
        $user = User::create([
            "cedula"=>$request['cedula'],
            "ruc"=>$request['ruc'],
            "telefono"=>$request['telefono'],
            "name"=>$request['name'],
            "email"=>$request['email'],
            "password"=>$passwordHashed,
        ]);
        $user->assignRole($rol->name);
        return redirect()->route('admin.listarMiembros');
    }

    public function listarMiembros(){
        $miembros =  User::role(['Administrador','Vendedor'])->get();
        // dd($miembros);
        // $miembros = Role::whereNotIn('name', ['Cliente'])->get();//obtenemos los roles excepto al rol cliente
        
        return view('paginas.admin.miembro.listar', compact('miembros'));
    }


    //=============== VENDEDOR ===========//
    public function agregarVenta(){
        return view('paginas.vendedor.venta.agregar');
    }

    public function agregarAbono($id){
        $user = User::find($id);
        $rol = $user->getRoleNames();
        $namerol = $rol['0'];
        if($namerol != "Cliente"){
            Alert::success('El usuario no es un cliente');
            return back();
        }

        // $saldo = $user->cuentas->control;
        // dd($user->cuentas);
        return view('paginas.vendedor.abono.agregar', compact('user'));
    }

    public function guardarAbono(Request $request){
        $cliente = User::find($request['cliente_id']);
        $cuenta = $cliente->cuentas->where('id',$request['cuenta_id'])->first();
        if($cliente==null || $cuenta==null){
            Alert::toast('La cuenta del cliente '.$cliente->name.' no pudo ser identificada','warning');
            return back();
        }
      
        return view('paginas.vendedor.abono.agregar',compact('cliente','cuenta'));
    }

    public function storeAbono(Request $request){
        $abono = Abono::create([
            "fecha"=>Carbon::now(),
            "cuenta_id"=>$request['cuenta_id'],
            "valor"=>$request['monto']
        ]);

        $cuenta = Cuenta::find($request['cuenta_id']);
        $saldo = $cuenta->saldo;
        $cuenta->update([
            "saldo"=>$saldo-$abono->valor,
            "abono"=>$abono->valor,
            "fecha"=>Carbon::now(),
            "user_id"=>$cuenta->user->id
        ]);
        if($cuenta->saldo<=0){
            // $pdf = PDF::loadView('pdf.cliente.cancelacioncredito', compact('cuenta'));
            // return $pdf->stream('cancelacioncredito.pdf');
            // $cuenta->delete(); // se elimina tambn el control de la cuenta y los abonos 
            Alert::success('Abono realizado con exito','El cliente ha pagado su crédito en su totalidad.');
            return redirect()->route('admin.dashboard');
        }

        Alert::success('Abono realizado con exito');
        return redirect()->route('admin.dashboard');
    }

    public function verClientes(){
        $clientes =  User::role(['Cliente'])->get();
        return view('paginas.vendedor.clientes.listar',compact('clientes'));
    }

    public function creditosCancelados(){
        $clientes =  User::role(['Cliente'])->get();
        $cancelados = collect(new User);
        foreach($clientes as $cliente){
            foreach($cliente->cuentas as $cuenta){
                if($cuenta->saldo<=0){
                    $cancelados->push($cuenta);
                }
            }
        }
       return view('paginas.vendedor.clientes.creditocancelado',compact('cancelados'));
    }

    public function creditosPendientes(){
        dd("creditos pendientes");
    }

    public function guardarVenta(Request $request){

        //====== VALIDACION DE LOS CAMPOS ======= //

         $campos = [
            "nombres"=>'required|max:30',
            "apellidos"=>'required|max:30',
            "cedula"=>'required|max:10',
            // "ruc"=>'required',
            "email"=>'required',
            "telefono"=>'required',
            "empresa"=>'required',
            "ciudad"=>'required',
            "codigopostal"=>'required|min:6|max:6',
            "direccion"=>'required',
            "descripcion"=>'required|max:200',
            "imagen"=>'required',
        ];
        $mensaje = [
            'required'=>':attribute es requerido',
            'nombres.max'=>'El nombre es muy extenso',
            'apellidos.max'=>'El apellido es muy extenso',
            'codigopostal.min'=>'El código postal debe tener una longitud de 6 dígitos',
            'codigopostal.max'=>'El código postal debe tener una longitud de 6 dígitos',
            'direccion.required' => 'La dirección es requerida',           
        ];
        $this->validate($request, $campos, $mensaje);

        if ($request->hasFile('imagen')) {
                $this->validate($request, [
                    'imagen'   => 'required',
                    'imagen' => 'max:1000',
                ],[
                    'imagen.required'=>'La imagen es requerida',
                    'imagen.image'=>'El archivo tienen que ser una imagen',
                    'imagen.mimes'=>'La imagen debe ser tipo png, jpg o jpeg',
                    // 'imagen.max'=>'La imagen supera el peso permitido (1Megabyte)'
                ]);
        }

        //============== CREAMOS LA FACTURA ===========//
        $factura = Factura::create([
            "fecha"=>Carbon::now(),
            "iva"=>12,
            "costo_envio"=>5,
            "total"=>$request['totalreq'],
        ]);
         
        if($request['formapago']=="1"){// CONTADO

            $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
            $orden = Orden::create([// el vendedor emite una orden de contado
                "cedula"=>$request['cedula'],
                "ruc"=>$request['ruc'],
                "telefono"=>$request['telefono'],
                "nombres"=>$request['nombres'],
                "apellidos"=>$request['apellidos'],
                "email"=>$request['email'],
                "fecha"=>Carbon::now(),
                "descripcion"=>$request['descripcion'],
                "cantidad"=>$shopping_cart->cantidad_de_productos(),
                "total"=>$request['totalreq'],
                "estado_pedido"=>"enviado",
                "empresa"=>$request['empresa'],
                "ciudad"=>$request['ciudad'],
                "codigopostal"=>$request['codigopostal'],
                "direccion"=>$request['direccion'],
                "costo_envio"=>5,
                "user_id"=>Auth::id(),//el id del vendedor
                "factura_id"=>$factura->id,
            ]);
            // ========= ENLAZAMOS LA IMAGEN DE PAGO A LA ORDEN CREADA === //
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $ruta=public_path().'/imgs/abonos/';
            $file->move($ruta, $name);
            $urlimage = '/imgs/abonos/'.$name;
        $orden->image()->create([
            'url'=>$urlimage
        ]);

         // ============ CREAMOS LOS DETALLES DE LA ORDEN ======== //
         foreach($shopping_cart->shopping_cart_details as $scd){
            DetalleOrden::create([
                "cantidad"=>$scd->cantidad,
                "precio"=>$scd->precio,
                "producto_id"=>$scd->producto_id,
                "orden_id"=>$orden->id,
            ]);
        }
            
        }else{

            $newpass = mt_rand(1000000000, 9999999999);
            // $newpass = Hash::make($newpass);
            $cliente = User::create([
                "cedula"=>$request['cedula'],
                "ruc"=>$request['ruc'],
                "telefono"=>$request['telefono'],
                "name"=>$request['nombres'],
                "email"=>$request['email'],
                "password"=>$newpass
            ]);
            $cliente->assignRole('Cliente');
            //Agregar funcionalidad para que el cliente reciba la contraseña al correo

            // ===== CREAMOS LA CUENTA DE CREDITO PARA EL CLIENTE ==== //
            $cuenta = Cuenta::create([
                "saldo"=>$request['totalreq']-$request['abono'],
                 "abono"=>$request['abono'],
                  "fecha"=>Carbon::now(),
                "user_id"=>$cliente->id
            ]);
            
            ControlCuenta::create([
                "cuota"=>$request['cuotarequest'],
                "interes"=>0.6,
                "meses"=>$request['mesesdiferir'],
                "fecha"=>Carbon::now(),
                "cuenta_id"=>$cuenta->id
            ]);

            $abono = Abono::create([
                "fecha"=>Carbon::now(),
                "valor"=>$request['abono'],
                "cuenta_id"=>$cuenta->id
            ]);

            $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
            $orden = Orden::create([// el vendedor emite una orden de contado
                "cedula"=>$request['cedula'],
                "ruc"=>$request['ruc'],
                "telefono"=>$request['telefono'],
                "nombres"=>$request['nombres'],
                "apellidos"=>$request['apellidos'],
                "email"=>$request['email'],
                "fecha"=>Carbon::now(),
                "descripcion"=>$request['descripcion'],
                "cantidad"=>$shopping_cart->cantidad_de_productos(),
                "total"=>$request['totalreq'],
                "estado_pedido"=>"enviado",
                "empresa"=>$request['empresa'],
                "ciudad"=>$request['ciudad'],
                "codigopostal"=>$request['codigopostal'],
                "direccion"=>$request['direccion'],
                "costo_envio"=>5,
                "user_id"=>Auth::id(),//el id del vendedor
                "factura_id"=>$factura->id,
            ]);
            // ========= ENLAZAMOS LA IMAGEN DE PAGO A LA ORDEN CREADA === //
            $file = $request->file('imagen');
            $name = time().'_'.$file->getClientOriginalName();
            $ruta=public_path().'/imgs/ordenes/';
            $file->move($ruta, $name);
            $urlimage = '/imgs/ordenes/'.$name;
        $orden->image()->create([
            'url'=>$urlimage
        ]);

         // ============ CREAMOS LOS DETALLES DE LA ORDEN ======== //
         foreach($shopping_cart->shopping_cart_details as $scd){
            DetalleOrden::create([
                "cantidad"=>$scd->cantidad,
                "precio"=>$scd->precio,
                "producto_id"=>$scd->producto_id,
                "orden_id"=>$orden->id,
            ]);
        }

        }
              
           $shopping_cart->delete(); //vaciamos o eliminamos el carrito al ya realizar el pedido
           Alert::success('Venta realizada con exito');
            return redirect()->route('admin.agregarVenta'); //regresamos a la pagina anterior
    }

    public function misVentas(){
        $ventas = Orden::where('user_id',Auth::id())->paginate(3);
        return view('paginas.vendedor.venta.listar', compact('ventas'));
    }

    public function showVenta($id){
      $orden = Orden::find($id);
    //   dd($orden);
        $detalles = $orden->detalle_ordenes()->get();
        return view('paginas.vendedor.venta.show', compact('detalles'));
    }
   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
