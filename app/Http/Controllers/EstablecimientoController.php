<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\establecimiento;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return  view('/establecimientos/create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'categoria_id' => 'required|exists:App\Categoria,id',
            'imagen_principal' => 'image|max:1000',
            'direccion' => 'required',
            'colonia' => 'required',
            /* 'lat' => 'required', */
            /* 'lng' => 'required', */
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'
        ]);
 
        $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

        //resize a la imagen

        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);
        $img->save();
        
        // guardar en la base de datos
        
        $establecimiento = new establecimiento();
        $establecimiento->name = $data['name'];
        $establecimiento->categoria_id     = $data['categoria_id'];
        $establecimiento->imagen_principal = $ruta_imagen;
        $establecimiento->direccion        = $data['direccion'];
        $establecimiento->colonia          = $data['colonia'];
        $establecimiento->lat              = $request['lat'];
        $establecimiento->lng              = $request['lng'];
        $establecimiento->telefono         = $data['telefono'];
        $establecimiento->descripcion      = $data['descripcion'];
        $establecimiento->apertura         = $data['apertura'];
        $establecimiento->cierre           = $data['cierre'];
        $establecimiento->uuid             = $data['uuid'];
        $establecimiento->user_id          = auth()->user()->id;
        $establecimiento->save();
        

        return back()->with('estado', 'tu informacion se actualizo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(establecimiento $establecimiento)
    {
        return "desde edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, establecimiento $establecimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(establecimiento $establecimiento)
    {
        //
    }
}
