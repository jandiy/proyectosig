<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Trabajo;
use App\DetalleTrabajo;

class EmergenciaController extends Controller
{
    public function index()
    {
        $trabajos = DB::select("select um.id, um.nombre, um.apellido 
        from usuario_movil as um, trabajo as e 
        where um.id=e.usuario_id");
        $emergencias=''; 
        $grupos=DB::select("select g.nombre, g.id from grupo as g");
        $ayudantes=DB::select("select um.nombre, um.apellido
        from usuario_movil as um, ubicacion as u, grupo as g
        where um.id=u.ayudante_id");  
        return view('emergencias.index',compact('trabajos','emergencias','grupos','ayudantes'));
    }
}
