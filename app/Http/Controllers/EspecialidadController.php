<?php

namespace App\Http\Controllers;
use DB;
use App\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = DB::select("select e.id, e.nombre, p.nombre as nom 
        from especialidad as e, grupo as p 
        where p.id=e.grupo_id and e.estado=1"); 
        $grupos = DB::select("select g.id, g.nombre
        from grupo as g
        where g.estado=1");  
        return view('especialidades.index',compact('especialidades','grupos'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'grupo' => 'required',
                                 
        ]);
        $espe= new Especialidad();
        $espe->nombre= $request->input('nombre');
        $espe->grupo_id= $request->input('grupo');
        $espe->estado=1;
        $espe->save();
        return redirect()->route('especialidades.index')
            ->with('success','Especialidad Registrada Exitosamente');  
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'nombre' => 'required',
            'grupo' => 'required',
                                
        ]);

        $producto = Especialidad::find($id);
        $producto->nombre  = $request->input('nombre');
        $producto->grupo_id=$request->input('grupo');
        $producto->update();

        return redirect()->route('especialidades.index')
            ->with('success','Especialidad Actualizada Exitosamente');    
    }

    public function destroy($id)
    {
        $user= Especialidad::find($id);
        $user->estado=0;
        $user->update();
        return redirect()->route('especialidades.index')
            ->with('success','Especialidad Borrada Exitosamente');
    }
}
