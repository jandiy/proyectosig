<?php

namespace App\Http\Controllers;
use DB;
use App\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function index(Request $request)
    {
        $grupo=$request->input('grupo');
        $grupos=DB::select("select id, nombre from grupo");
        
        if($grupo != null){
            dd("entro 1");
            $trabajos = DB::select("select t.id, um.nombre, um.apellido, dt.nombre as estado, em.longitud, em.latitud, t.fecha
            from usuario_movil as um, trabajo as t, detalle_especialidad as de, detalle_trabajo as dt, especialidad as e, grupo as g, emergencia as em
            where um.id=de.ayudante_id and de.especialidad_id=e.id and e.grupo_id=g.id and dt.trabajo_id=t.id and de.id=dt.dtespecialidad_id 
            and em.id=t.emergencia_id and dt.estado='activo' and g.id=".$grupo); 

        }
        else{
            dd("entro 2");
            $trabajos = DB::select("select t.id, um.nombre, um.apellido, dt.nombre as estado, em.longitud, em.latitud, t.fecha
            from usuario_movil as um, trabajo as t, detalle_especialidad as de, detalle_trabajo as dt, especialidad as e, grupo as g, emergencia as em
            where um.id=de.ayudante_id and de.especialidad_id=e.id and e.grupo_id=g.id and dt.trabajo_id=t.id and de.id=dt.dtespecialidad_id 
            and em.id=t.emergencia_id and dt.estado='activo'");  
        }

        return view('trabajos.index',compact('trabajos','grupos'));
    }
    public function show($id)
    {
        $trabajo = Trabajo::find($id);//sacar hora y fecha, ubicacion del ayudante al inicio
        $estudiante=DB::select("select um.nombre, um.id, um.apellido
        from trabajo as t, usuario_movil as um, emergencia as e
        where e.estudiante_id=um.id and t.emergencia_id=e.id and t.id=".$id);
        $ayudante=DB::select("select um.nombre, um.id, um.apellido
        from trabajo as t, detalle_trabajo as dt, detalle_especialidad as de, usuario_movil as um
        where t.id=dt.trabajo_id and de.ayudante_id=um.id and de.id=dt.dtespecialidad_id and t.id=".$id);
        $direccion=DB::select("select e.longitud, e.latitud
        from trabajo as t, usuario_movil as um, emergencia as e
        where t.emergencia_id=e.id and t.id=".$id);
        $estado=DB::select("select dt.nombre
        from trabajo as t, detalle_trabajo as dt
        where dt.estado='activo' and t.id=dt.trabajo_id and t.id=".$id);

        return view('trabajos.show',compact('trabajo','direccion','estado','estudiante','ayudante'));
    }
}
