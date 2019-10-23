<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UsuarioMovil;
use App\Estudiante;
class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = DB::select("select um.id, um.nombre, um.apellido 
        from usuario_movil as um, estudiante as e 
        where um.id=e.usuario_id");   
        return view('estudiantes.index',compact('estudiantes'));
    }
    public function show($id)
    {
        $estudiante = UsuarioMovil::find($id);
       
        $movil=DB::select("select a.fecha_registro, a.carrera, a.facultad
        from usuario_movil as um, estudiante as a
        where um.id=a.usuario_id and um.id=".$id);

        return view('estudiantes.show',compact('estudiante','movil'));
    }
}
