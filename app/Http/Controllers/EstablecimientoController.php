<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\establecimiento;
use Illuminate\Http\Request;

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
        //
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
