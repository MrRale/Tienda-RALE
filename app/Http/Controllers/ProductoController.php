<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Inventario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
{
    
    public function index()
    {
        //
        $productos = Producto::all();
        return view('paginas.admin.producto.listar',compact('productos'));
    }


    public function productosByCategoria($id){
        $productos = Producto::where('categoria_id',$id)->get();
        return view('paginas.admin.filtros.productosByCategoria', compact('productos'));
    }

    public function productosByInventario($id){
        $productos = Producto::where('inventario_id',$id)->get();
        return view('paginas.admin.filtros.productosByInventario', compact('productos'));
    }

   
    public function create()
    {
        //
        $categorias = Categoria::all();
        $inventarios = Inventario::all();
        return view('paginas.admin.producto.agregar', compact('categorias','inventarios'));
    }

  
    public function store(Request $request)
    {
        $stock = $request['stock'];
        // dd($stock);
        
        $request = $request->except('_token');
        $producto =  Producto::create([
            "nombre" => $request['nombre'],
            "marca" => $request['marca'],
            "medida" =>$request['medida'],
            "stock"=>$request['stock'],
            "descripcion" =>$request['descripcion'],
            "codigo" =>$request['codigo'],
            "precio" => $request['precio'],
            "categoria_id" =>$request['categoria_id'],
            "inventario_id" =>$request['inventario_id']
        ]);

       $this->upload_file($request,$producto);
       Alert::toast('Producto agregado', 'success');
       return redirect()->route('producto.index');
    }


    public function editarProducto(Request $request){
      
        $producto = Producto::findOrFail($request->id);
        $request = $request->except(['_token']);
        $producto->update([
            "nombre"=>$request['nombre'],
            "descripcion"=>$request['descripcion'],
            "medida"=>$request['medida'],
            "stock"=>$request['stock'],
            "precio"=>$request['precio'],
            "codigo"=>$request['codigo'],
            "categoria_id"=>$request['categoria_id'],
            "inventario_id"=>$request['inventario_id'],
            "marca"=>$request['marca']
        ]);
        //relacionamos la nueva imagen que añadio
        $this->upload_image($request, $producto);
        return redirect()->route('producto.index')->with('mensaje','Producto actualizado');
    }

    public function upload_file($request , $producto){
        $urlimages = [];
        if(request()->hasFile('images')){
           
            $images = request()->file('images');
            foreach($images as $image){
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/image';
            $image->move($ruta,$nombre);
            $urlimages[]['url']='/image/'.$nombre;
            }
        }
        $producto->images()->createMany($urlimages);
    }


    public function edit(Producto $producto)
    {
        
        // $producto = Producto::findOrFail($producto->get('id'))->first();
        // dd($producto);
        $categorias = Categoria::all();
        $inventarios = Inventario::all();
        return view('paginas.admin.producto.editar', compact('producto','categorias','inventarios'));
    }

  
    public function update(Request $request, Producto $producto)
    {
        // $anuncio = Anuncio::findOrFail($request->get('anuncio_id'));
  
        $request= $request->except('_token');
        $producto->update([
            "nombre"=>$request['nombre'],
            "descripcion"=>$request['descripcion'],
            "medida"=>$request['medida'],

            "stock"=>$request['stock'],
            "precio"=>$request['precio'],
            "codigo"=>$request['codigo'],
            "categoria_id"=>$request['categoria_id'],
            "inventario_id"=>$request['inventario_id'],
            "marca"=>$request['marca']
        ]);
        if(request()->hasFile('image')){
        //relacionamos la nueva imagen que añadio
        $this->upload_image($request, $producto);
        }
        Alert::toast('Producto editado', 'success');

        return redirect()->route('producto.index')->with('mensaje','Producto actualizado con exito!');
    }

    public function upload_image($request, $producto){
      
        $file = request()->file('image');
        $name = time().'_'.$file->getClientOriginalName();
        $ruta=public_path().'/image';
        $file->move($ruta, $name);
        $urlimage = '/image/'.$name;
    
    $producto->images()->create([
        'url'=>$urlimage
    ]);
    
}

   
    public function destroy(Producto $producto)
    {
        //
  
        Producto::destroy($producto->id);
        Alert::toast('Producto eliminado', 'success');
        return back()->with('mensaje','Producto eliminado');
    }
}
