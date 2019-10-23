<?php

namespace App\Http\Controllers;
use DB;
use App\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function index()
    {
        $trabajos = DB::select("select um.id, um.nombre, um.apellido 
        from usuario_movil as um, trabajo as e 
        where um.id=e.usuario_id");   
        return view('trabajos.index',compact('trabajos'));
    }
    public function show($id)
    {
        $trabajo = Trabajo::find($id);
       
        $movil=DB::select("select a.fecha_registro, a.carrera, a.facultad
        from usuario_movil as um, trabajo as a
        where um.id=a.usuario_id and um.id=".$id);

        return view('trabajos.show',compact('trabajo','movil'));
    }
}
