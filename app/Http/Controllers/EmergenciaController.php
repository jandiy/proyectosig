<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Trabajo;

class EmergenciaController extends Controller
{
    public function index()
    {
        $trabajos = DB::select("select um.id, um.nombre, um.apellido 
        from usuario_movil as um, trabajo as e 
        where um.id=e.usuario_id");
        $emergencias='';   
        return view('emergencias.index',compact('trabajos','emergencias'));
    }
}
