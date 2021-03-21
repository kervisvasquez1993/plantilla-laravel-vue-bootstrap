<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\establecimiento;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /* metodo para obtener todas las categorias */

    public function categorias()
    {
        $categoria = Categoria::all();
        return response()->json($categoria);
    }

    //muestra los establecimiento de categoria especificos

    public function categoria(Categoria $categoria)
    {
        
        $establecimientos = establecimiento::where('categoria_id', $categoria->id)->with('categoria')->get();
        return response()->json($establecimientos);
    }
}
