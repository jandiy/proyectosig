<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = DB::select("select um.id, um.nombre, um.apellido 
        from usuario_movil as um, estudiante as e 
        where um.id=e.usuario_id");   
        return view('estudiantes.index',compact('estudiantes'));
    }
}
