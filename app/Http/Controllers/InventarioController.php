<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventarios = Inventario::all();
    
        return view('paginas.admin.inventario.listar', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paginas.admin.inventario.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request = $request->except("_token");
        Inventario::create($request);
        Alert::toast('Inventario agregado', 'success');
        return redirect()->route('inventario.index')->with('mensaje','Inventario agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
        return view('paginas.admin.inventario.editar', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarioRequest  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request= $request->except('_token');
        $inventario->update([
            "nombre"=>$request['nombre']
        ]);
       
        Alert::toast('Inventario editado', 'success');
        return redirect()->route('inventario.index');
    }


    public function destroy(Inventario $inventario)
    {
        //
        Inventario::destroy($inventario->id);
        Alert::toast('Inventario eliminado', 'success');
        return back();
    }
}
