<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias =  Categoria::all();
        $inventarios = Inventario::all();
        return view('paginas.admin.categoria.listar', compact('categorias','inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paginas.admin.categoria.agregar');
    }

    
    public function store(Request $request)
    {
        // if($request->hasFile('imagen')){
        //     dd($request['imagen']);
        // }
        //    dd($request);
        $campos = [
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:256',
            'imagen' => 'required|max:1000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max'=>'El nombre no debe sobrepasar los 30 caracteres',
            'descripcion.max'=>'La descripcion no debe sobrepasar los 256 caracteres',
            'imagen.required' => 'La imagen es requerida',
            'imagen.mimes'=>'La imagen debe ser jpg, png o jpeg',
            'imagen.max'=>'La imagen es muy pesada',
            'descripcion.required' => 'La descripción es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCategoria = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $datosCategoria['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        

        Categoria::create($datosCategoria);
        Alert::toast('Categoría agregada', 'success');

        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('paginas.admin.categoria.editar',compact('categoria'));
    }

   
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:256',
            'imagen' => 'required|max:1000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max'=>'El nombre no debe sobrepasar los 30 caracteres',
            'descripcion.max'=>'La descripcion no debe sobrepasar los 256 caracteres',
            'imagen.required' => 'La imagen es requerida',
            'imagen.mimes'=>'La imagen debe ser jpg, png o jpeg',
            'imagen.max'=>'La imagen es muy pesada',
            'descripcion.required' => 'La descripción es requerida',
        ];
        $this->validate($request, $campos, $mensaje);

       $categoria = Categoria::findOrFail($id);
        $request = $request->except(['_token','_method']);
        $categoria->update([
            "nombre" => $request['nombre'],
            "descripcion" => $request['descripcion'],
        ]);

       

        if(request()->hasFile('imagen')){
            $categoria=Categoria::findOrFail($categoria->id);
            Storage::delete('public/'.$categoria->imagen);
            $request['imagen']=request()->file('imagen')->store('uploads','public');
        }
        Categoria::where('id','=',$categoria->id)->update($request);
        Alert::toast('Categoría editada', 'success');
        return redirect()->route('categoria.index');
    }

    

    public function destroy($id)
    {
        //
        
        Categoria::destroy($id);
        Alert::toast('Categoría eliminada', 'success');
        return back();
    }
}
