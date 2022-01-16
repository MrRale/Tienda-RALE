<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingCartDetailController;

Auth::routes();
//-------------VISTAS DE LOS VISITANTES-----------//
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tienda', [HomeController::class, 'tienda'])->name('home.tienda');
Route::get('/nosotros',[HomeController::class, 'nosotros'])->name('home.nosotros');
Route::get('/contactanos',[HomeController::class, 'contactanos'])->name('home.contactanos');
Route::post('/contactanos/mensaje',[HomeController::class, 'contactanos_mensaje'])->name('home.contactanosMensaje');
Route::get('/detalle/{producto}', [HomeController::class, 'detalle'])->name('home.detalle');
Route::get('/buscar',[HomeController::class,'filtrado'])->name('home.filtrado');
Route::get('/buscar/categoria/{id}',[HomeController::class,'filtradoCategoriaSidebar'])->name('home.filtradoCategoria');
Route::get('/buscar/precio',[HomeController::class,'filtradoPrecioSidebar'])->name('home.filtradoPrecio');
Route::get('/ordenar/productos',[HomeController::class,'ordenarProductos'])->name('home.ordenarProductos');

//-------------VISTAS O FUNCIONALIDADES DE LOS CLIENTES YA REGISTRADOS ----------//
Route::group(['middleware'=>'cliente'], function () {
    Route::post('/comentar/{producto}', [ClienteController::class, 'comentar'])->name('cliente.comentar');
    Route::get('/perfil',[ClienteController::class, 'perfil'])->name('cliente.perfil');
    Route::post('/perfil/actualizar-perfil',[ClienteController::class, 'actualizarPerfil'])->name('cliente.actualizarPerfil');
    Route::get('/orden/detalle/{pedido}',[PedidoController::class, 'show'])->name('cliente.show');
    Route::get('/pasarela',[ClienteController::class, 'pasarela'])->name('cliente.pasarela');
    Route::post('/pasarela',[ClienteController::class, 'pagar'])->name('cliente.pagar');
});


//RUTAS DEL CARRITO DE COMPRA
Route::post('/actualizar-carrito',[ShoppingCartController::class,'actualizar'])->name('shoppingcart.actualizar');
Route::resource('shopping_cart_detail',ShoppingCartDetailController::class)->only(['update','store'])->names('shopping_cart_details');
Route::get('/producto-carrito/retirar/{scd}',[ShoppingCartDetailController::class,'retirar'])->name('shoppingCartDetail.retirar');
Route::get('/cesta',[ShoppingCartController::class,'cesta'])->name('shoppingcart.cesta');


//--------------VISTAS O FUNCIONALIDADES PARA LOS ADMINISTRADORES
Route::group(['prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('inventario', InventarioController::class);
    Route::get('/productos/categoria/{id}',[ProductoController::class,'productosByCategoria'])->name('producto.productosByCategoria');
    Route::get('/productos/inventario/{id}',[ProductoController::class,'productosByInventario'])->name('producto.productosByInventario');
    Route::get('/pedidos',[AdminController::class,'pedidos'])->name('admin.pedidos');
    Route::get('/detalle/pedido/{pedido}',[AdminController::class,'showPedido'])->name('admin.detallePedidos');
    Route::get('/detalle/estado/{id}',[AdminController::class,'cambiarEstadoPedido'])->name('admin.cambiarEstadoPedido');
    Route::get('/miembro/agregar',[AdminController::class,'agregarMiembro'])->name('admin.agregarMiembro');
    Route::post('/miembro/agregar',[AdminController::class,'guardarMiembro'])->name('admin.guardarMiembro');
    Route::get('/miembros/listar',[AdminController::class,'listarMiembros'])->name('admin.listarMiembros');

    //===========VISTAS PARA EL VENDEDOR, PERO QUE TMBN EL ADMIN TENDRA ACCESO =======//
    Route::get('/venta/agregar',[AdminController::class,'agregarVenta'])->name('admin.agregarVenta');
    Route::post('/venta/guardar',[AdminController::class,'guardarVenta'])->name('admin.guardarVenta');
    Route::get('/ventas/misventas',[AdminController::class,'misVentas'])->name('admin.misVentas');
    Route::get('/ventas/detalle/{id}',[AdminController::class,'showVenta'])->name('admin.detalleVenta');
    Route::post('/abonos/abonar',[AdminController::class, 'agregarAbono'])->name('admin.agregarAbono');
    Route::post('/abonos/abonar',[AdminController::class,'guardarAbono'])->name('admin.guardarAbono');
    Route::post('/abonos/guardar',[AdminController::class,'storeAbono'])->name('admin.storeAbono');
    Route::get('/clientes',[AdminController::class, 'verClientes'])->name('admin.verClientes');
    Route::get('/clientes/credito/cancelado',[AdminController::class,'creditosCancelados'])->name('admin.creditosCancelados');
    Route::get('/clientes/credito/pendiente',[AdminController::class,'creditosPendientes'])->name('admin.creditosPendientes');
});
