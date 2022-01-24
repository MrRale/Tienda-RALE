<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Empresa;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\ControlOrden;
use App\Models\DetalleOrden;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
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

    public function pedidos()
    {
        $pedidos = Pedido::paginate(2);
        return view('paginas.admin.pedidos.index', compact('pedidos'));
    }

    public function pedidosVendedor()
    {
        $ordenes = Orden::paginate(2);
        return view('paginas.admin.pedidos.pedidosvendedor', compact('ordenes'));
    }

    public function ventasByMiembro($id)
    {
        $ventas = Orden::where('user_id', $id)->get();
        $vendedor = User::find($id);

        return view('paginas.admin.miembro.ventasByMiembro', compact('ventas', 'vendedor'));
    }


    public function verAbonos()
    {

        $clientes =  User::role(['Cliente'])->get();

        return view('paginas.vendedor.clientes.abonos', compact('clientes'));
    }

    public function abonosByCliente(Request $request)
    {

        if (!$request['orden_id']) {

            Alert::toast('Seleccione la orden para identificar los abonos', 'info');
            return back();
        }
        $cliente = User::find($request->cliente_id);
        foreach ($cliente->ordenes as $orden) {
            if ($orden->id == $request->orden_id) {
                $abonos = Abono::where('orden_id', $orden->id)->get();
            }
            $orden = Orden::find($request['orden_id']);
            $saldo = $orden->saldo;
        }
        return view('paginas.vendedor.clientes.abonosByCliente', compact('abonos', 'cliente', 'saldo', 'orden'));
    }

    public function showPedido(Pedido $pedido)
    {
        $pedidos = $pedido->detalle_pedidos()->get();
        $cliente = $pedido->user;
        // dd($cliente);
        return view('paginas.admin.pedidos.show', compact('pedido', 'pedidos', 'cliente'));
    }

    public function showPedidoVendedor($id)
    {
        $orden = Orden::find($id);
        $ordenes = $orden->detalle_ordenes()->get();
        $vendedor = $orden->user;
        return view('paginas.admin.pedidos.showvendedor', compact('orden', 'ordenes', 'vendedor'));
    }

    public function cambiarEstadoPedido($id)
    {
        $pedido = Pedido::find($id);
        if ($pedido->estado_pedido == "pendiente") {
            $pedido->update(["estado_pedido" => "enviado"]);
        } else {
            $pedido->update(["estado_pedido" => "pendiente"]);
        }

        Alert::toast('Pedido cambiado de estado', 'success');
        return back();
    }

    public function cambiarEstadoOrden($id)
    {
        $orden = Orden::find($id);
        if ($orden->estado_pedido == "pendiente") {
            $orden->update(["estado_pedido" => "enviado"]);
        } else {
            $orden->update(["estado_pedido" => "pendiente"]);
        }

        Alert::toast('Orden cambiada de estado', 'success');
        return back();
    }

    public function agregarMiembro()
    {
        $roles = Role::whereNotIn('name', ['Cliente'])->get();

        return view('paginas.admin.miembro.agregar', compact('roles'));
    }

    public function guardarMiembro(Request $request)
    {
        $rol = Role::find($request['rol_id']);
        $passwordHashed = Hash::make($request['password']);
        $user = User::create([
            "cedula" => $request['cedula'],
            "ruc" => $request['ruc'],
            "telefono" => $request['telefono'],
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => $passwordHashed,
        ]);
        $user->assignRole($rol->name);
        return redirect()->route('admin.listarMiembros');
    }

    public function listarMiembros()
    {
        $miembros =  User::role(['Administrador', 'Vendedor'])->get();
        // dd($miembros);
        // $miembros = Role::whereNotIn('name', ['Cliente'])->get();//obtenemos los roles excepto al rol cliente

        return view('paginas.admin.miembro.listar', compact('miembros'));
    }

    public function pdfPedidoCliente($id)
    {
        $pedido = Pedido::find($id);
        $pedidos = $pedido->detalle_pedidos()->get();
        $cliente = User::find($pedido->user_id);
        $pdf = PDF::loadView('pdf.cliente.pedidos', compact('pedido', 'pedidos', 'cliente')); // se carga la data en la plantilla
        return $pdf->stream('pedido.pdf'); //retorna el pdf con el nombre compra_creditos.pdf

    }

    public function pdfOrdenVendedor($id)
    {
        $orden = Orden::find($id);
        $ordenes = $orden->detalle_ordenes()->get();
        $cliente = User::find($orden->user_id);
        $pdf = PDF::loadView('pdf.vendedor.ordenes', compact('orden', 'ordenes', 'cliente')); // se carga la data en la plantilla
        return $pdf->stream('orden.pdf'); //retorna el pdf con el nombre compra_creditos.pdf
    }


    //=============== VENDEDOR ===========//

    public function ordenesCliente($id)
    {
        $cliente = User::find($id);
        return view('paginas.vendedor.clientes.ordenesCliente', compact('cliente'));
    }

    public function agregarVenta()
    {
        $empresa = Empresa::first();
        return view('paginas.vendedor.venta.agregar', compact('empresa'));
    }

    public function agregarAbono($id)
    {
        $user = User::find($id);
        $rol = $user->getRoleNames();
        $namerol = $rol['0'];
        if ($namerol != "Cliente") {
            Alert::success('El usuario no es un cliente');
            return back();
        }

        // $saldo = $user->cuentas->control;
        // dd($user->cuentas);
        return view('paginas.vendedor.abono.agregar', compact('user'));
    }

    public function guardarAbono($idcliente, $idorden)
    {
        $cliente = User::find($idcliente);
        $orden = Orden::find($idorden);
        // if($cliente==null || $orden==null){
        //     Alert::toast('La orden del cliente '.$cliente->name.' no pudo ser identificada','warning');
        //     return back();
        // }
        return view('paginas.vendedor.abono.agregar', compact('cliente', 'orden'));
    }

    public function storeAbono(Request $request)
    {
        $abono = Abono::create([
            "fecha" => Carbon::now(),
            "orden_id" => $request['orden_id'],
            "valor" => $request['monto']
        ]);

        if($request->hasFile('imagen')){

        }

        $orden = Orden::find($request['orden_id']);

        $saldo = $orden->saldo;
        $orden->update([
            "saldo" => $saldo - $abono->valor,
        ]);
        if ($orden->saldo <= 0) {
            // $cuenta->delete(); // se elimina tambn el control de la cuenta y los abonos 
            Alert::success('Abono realizado con exito', 'El cliente ha pagado su crédito en su totalidad.');
            return redirect()->route('admin.dashboard');
        }

        Alert::success('Abono realizado con exito');
        return redirect()->route('admin.dashboard');
    }

    public function verClientes()
    {
        $clientes =  User::role(['Cliente'])->get();
        return view('paginas.vendedor.clientes.listar', compact('clientes'));
    }

    public function creditosCancelados()
    {
        $clientes =  User::role(['Cliente'])->get();
        $cancelados = collect(new User);
        foreach ($clientes as $cliente) {
            foreach ($cliente->ordenes as $orden) {
                if ($orden->saldo <= 0) {
                    $cancelados->push($orden);
                }
            }
        }
        return view('paginas.vendedor.clientes.creditocancelado', compact('cancelados'));
    }

    public function creditosPendientes()
    {
        $clientes =  User::role(['Cliente'])->get();
        $pendientes = collect(new User);
        foreach ($clientes as $cliente) {
            foreach ($cliente->ordenes as $orden) {
                if ($orden->saldo > 0) {
                    $pendientes->push($orden);
                }
            }
        }
        return view('paginas.vendedor.clientes.creditopendiente', compact('pendientes'));
    }

    public function guardarVenta(Request $request)
    {
        //====== VALIDACION DE LOS CAMPOS ======= //
        $campos = [
            "nombres" => 'required|max:30',
            "apellidos" => 'required|max:30',
            "cedula" => 'required|min:10|max:10',
            "email" => 'required',
            "telefono" => 'required',
            "empresa" => 'required',
            "ciudad" => 'required',
            "direccion" => 'required',
            "descripcion" => 'required|max:200',
            "imagen" => 'required',
        ];
        $mensaje = [
            'cedula' => 'La cedula debe contener 10 dígitos',
            'required' => ':attribute es requerido',
            'nombres.max' => 'El nombre es muy extenso',
            'apellidos.max' => 'El apellido es muy extenso',
            'direccion.required' => 'La dirección es requerida',
        ];
        $this->validate($request, $campos, $mensaje);

        if ($request->hasFile('imagen')) {
            $this->validate($request, [
                'imagen'   => 'required',
                'imagen' => 'max:1000',
            ], [
                'imagen.required' => 'La imagen es requerida',
                'imagen.image' => 'El archivo tienen que ser una imagen',
                'imagen.mimes' => 'La imagen debe ser tipo png, jpg o jpeg',
                // 'imagen.max'=>'La imagen supera el peso permitido (1Megabyte)'
            ]);
        }

        //============== CREAMOS LA FACTURA ===========//
        $factura = Factura::create([
            "fecha" => Carbon::now(),
            "iva" => 12,
            "costo_envio" => 5,
            "total" => $request['totalreq'],
        ]);

        if ($request['formapago'] == "1") { // CONTADO

            $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
            $orden = Orden::create([ // el vendedor emite una orden de contado
                "cedula" => $request['cedula'],
                "ruc" => $request['ruc'],
                "telefono" => $request['telefono'],
                "nombres" => $request['nombres'],
                "apellidos" => $request['apellidos'],
                "email" => $request['email'],
                "fecha" => Carbon::now(),
                "descripcion" => $request['descripcion'],
                "cantidad" => $shopping_cart->cantidad_de_productos(),
                "total" => $request['totalreq'],
                "estado_pedido" => "enviado",
                "empresa" => $request['empresa'],
                "saldo" => 0,
                "ciudad" => $request['ciudad'],
                "direccion" => $request['direccion'],
                "costo_envio" => 5,
                "vendedor_id" => Auth::id(),
                // "user_id" nulo porque es venta a contado, solo se toman los datos de la orden
                "factura_id" => $factura->id,
            ]);

             //abono en base a una
             $abono = Abono::create([
                "fecha" => Carbon::now(),
                "valor" => $request['abono'],
                "orden_id" => $orden->id
            ]);

            // ========= ENLAZAMOS LA IMAGEN DE ABONO === //
          if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time() . '_' . $file->getClientOriginalName();
            $ruta = public_path() . '/imgs/abonos/';
            $file->move($ruta, $name);
            $urlimage = '/imgs/abonos/' . $name;
            $orden->image()->create([
                'url' => $urlimage
            ]);
          }

            // ============ CREAMOS LOS DETALLES DE LA ORDEN ======== //
            foreach ($shopping_cart->shopping_cart_details as $scd) {
                DetalleOrden::create([
                    "cantidad" => $scd->cantidad,
                    "precio" => $scd->precio,
                    "producto_id" => $scd->producto_id,
                    "orden_id" => $orden->id,
                ]);

                $producto = Producto::find($scd->producto_id);
                $stock_actual = $producto->stock;
                $producto->update([
                    "stock"=>$stock_actual-$scd->cantidad
                ]);
            }
        } else { // CREDITO

            $cliente = User::where('cedula', $request['cedula'])->first();

            if ($cliente) {
                $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
                $newOrden = Orden::create([
                    "cedula" => $request['cedula'],
                    "ruc" => $request['ruc'],
                    "telefono" => $request['telefono'],
                    "nombres" => $request['nombres'],
                    "apellidos" => $request['apellidos'],
                    "email" => $request['email'],
                    "fecha" => Carbon::now(),
                    "descripcion" => $request['descripcion'],
                    "cantidad" => $shopping_cart->cantidad_de_productos(),
                    "total" => $request['totalreq'],
                    "estado_pedido" => "enviado",
                    "empresa" => $request['empresa'],
                    "ciudad" => $request['ciudad'],
                    "direccion" => $request['direccion'],
                    "saldo" => $request['totalreq'],
                    "costo_envio" => 5,
                    "user_id" => $cliente->id,
                    "vendedor_id" => Auth::id(), //el id del vendedor
                    "factura_id" => $factura->id,
                ]);

                // ============ CREAMOS LOS DETALLES DE LA ORDEN ======== //
                foreach ($shopping_cart->shopping_cart_details as $scd) {
                    DetalleOrden::create([
                        "cantidad" => $scd->cantidad,
                        "precio" => $scd->precio,
                        "producto_id" => $scd->producto_id,
                        "orden_id" => $newOrden->id,
                    ]);
                    $producto = Producto::find($scd->producto_id);
                    $stock_actual = $producto->stock;
                    $producto->update([
                        "stock"=>$stock_actual-$scd->cantidad
                    ]);
                }

                //abono en base a una
                $abono = Abono::create([
                    "fecha" => Carbon::now(),
                    "valor" => $request['abono'],
                    "orden_id" => $newOrden->id
                ]);

                // ========= ENLAZAMOS LA IMAGEN DE PAGO AL ABONO REGISTRADO === //
                if ($request->hasFile('imagen')) {
                    $file = $request->file('imagen');
                    $name = time() . '_' . $file->getClientOriginalName();
                    $ruta = public_path() . '/imgs/abonos/';
                    $file->move($ruta, $name);
                    $urlimage = '/imgs/abonos/' . $name;
                    $abono->images()->create([
                        'url' => $urlimage
                    ]);
                }

                ControlOrden::create([
                    "cuota" => $request['cuotarequest'],
                    "interes" => 0.6,
                    "meses" => $request['mesesdiferir'],
                    "fecha" => Carbon::now(),
                    "orden_id" => $newOrden->id
                ]);
            } else {

                $newpass = mt_rand(1000000000, 9999999999);
                // $newpass = Hash::make($newpass);
                $cliente = User::create([
                    "cedula" => $request['cedula'],
                    "ruc" => $request['ruc'],
                    "telefono" => $request['telefono'],
                    "name" => $request['nombres'],
                    "email" => $request['email'],
                    "password" => $newpass
                ]);
                $cliente->assignRole('Cliente');
                $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
                $orden = Orden::create([ // el vendedor emite una orden de contado
                    "cedula" => $request['cedula'],
                    "ruc" => $request['ruc'],
                    "telefono" => $request['telefono'],
                    "nombres" => $request['nombres'],
                    "apellidos" => $request['apellidos'],
                    "email" => $request['email'],
                    "fecha" => Carbon::now(),
                    "descripcion" => $request['descripcion'],
                    "cantidad" => $shopping_cart->cantidad_de_productos(),
                    "total" => $request['totalreq'],
                    "estado_pedido" => "enviado",
                    "empresa" => $request['empresa'],
                    "ciudad" => $request['ciudad'],
                    "direccion" => $request['direccion'],
                    "saldo" => $request['totalreq'],
                    "costo_envio" => 5,
                    "user_id" => $cliente->id,
                    "vendedor_id" => Auth::id(), //el id del vendedor
                    "factura_id" => $factura->id,
                ]);

                // ============ CREAMOS LOS DETALLES DE LA ORDEN ======== //
                foreach ($shopping_cart->shopping_cart_details as $scd) {
                    DetalleOrden::create([
                        "cantidad" => $scd->cantidad,
                        "precio" => $scd->precio,
                        "producto_id" => $scd->producto_id,
                        "orden_id" => $orden->id,
                    ]);
                    $producto = Producto::find($scd->producto_id);
                    $stock_actual = $producto->stock;
                    $producto->update([
                        "stock"=>$stock_actual-$scd->cantidad
                    ]);
                }

                //abono en base a una
                $abono = Abono::create([
                    "fecha" => Carbon::now(),
                    "valor" => $request['abono'],
                    "orden_id" => $orden->id
                ]);

                // ========= ENLAZAMOS LA IMAGEN DE PAGO AL ABONO GENERADO === //
                if ($request->hasFile('imagen')) {
                    $file = $request->file('imagen');
                    $name = time() . '_' . $file->getClientOriginalName();
                    $ruta = public_path() . '/imgs/abonos/';
                    $file->move($ruta, $name);
                    $urlimage = '/imgs/abonos/' . $name;
                    $abono->images()->create([
                        'url' => $urlimage
                    ]);
                }

                ControlOrden::create([
                    "cuota" => $request['cuotarequest'],
                    "interes" => 0.6,
                    "meses" => $request['mesesdiferir'],
                    "fecha" => Carbon::now(),
                    "orden_id" => $orden->id
                ]);
            }



            //Agregar funcionalidad para que el cliente reciba la contraseña al correo

            // ===== CREAMOS LA CUENTA DE CREDITO PARA EL CLIENTE ==== //
            // $cuenta = Cuenta::create([
            //     "saldo"=>$request['totalreq']-$request['abono'],
            //      "abono"=>$request['abono'],
            //       "fecha"=>Carbon::now(),
            //     "user_id"=>$cliente->id
            // ]);
            //ControlCuenta en base a un pedido

        } // fin sino de pago por credito

        $shopping_cart->delete(); //vaciamos o eliminamos el carrito al ya realizar el pedido
        Alert::success('Venta realizada con exito');
        return redirect()->route('admin.agregarVenta'); //regresamos a la pagina anterior
    }

    public function misVentas()
    {
        $ventas = Orden::where('vendedor_id', Auth::id())->paginate(3);
        return view('paginas.vendedor.venta.listar', compact('ventas'));
    }

    public function showVenta($id)
    {
        $orden = Orden::find($id);
        //   dd($orden);
        $detalles = $orden->detalle_ordenes()->get();
        return view('paginas.vendedor.venta.show', compact('detalles'));
    }
}
