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

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'genero'=> 'required', 
            'fecha_nacimiento'=> 'required', 
            'celular' => 'required',  
            'contacto_emergencia' => 'required', 
            'longitud' => 'required',
            'latitud'=>'required',                    
        ]);

       // dd($request->input('longitud'));    
        $usuario = new UsuarioMovil();
        $usuario->nombre  = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
        $usuario->contrasena = $request->input('contrasena');
        $usuario->genero = $request->input('genero');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->celular= $request->input('celular');
        $usuario->contacto_emergencia= $request->input('contacto_emergencia');
        $usuario->latitud= $request->input('latitud');
        $usuario->longitud= $request->input('longitud');
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload','1569212052_img_msanoja_20160801-194152_imagenes_lv_getty.jpg');
           $usuario->foto=$filename;
          }
        
        if($usuario->save()){
            $estudiante= new Estudiante();
            $estudiante->usuario_id=$usuario->id;
            $time= Carbon::now('America/La_Paz');
            $estudiante->fecha_registro=$time->toDateString();
            $estudiante->carrera=$request->input('carrera');
            $estudiante->facultad=$request->input('facultad');
            $estudiante->estado=1;
            $estudiante->save();
            return response()->json($usuario);
        }
        else{
            return response()->json('sorry',500);
        }
        

          
    }
    public function getDatos(Request $request)
    {
        $this->validate($request, [
            
            'contrasena'=> 'required', 
            'email'=> 'required',                   
        ]);
        $email='@gmail.com';
        $con=($request->contrasena);
        $em=($request->email).$email;
       /* $usuario = DB::select("select um.id, um.nombre, um.apellido, um.foto, um.correo, um.contrasena, um.celular, um.contacto_emergencia, um.latitud, um.longitud
        from usuario_movil as um
        where um.contrasena=".$con." and um.email=".$em);*/
        
        $usuario=DB::table('usuario_movil as um') 
        ->join('estudiante as e','e.usuario_id','=','um.id') 
         ->select('um.id', 'um.nombre', 'um.apellido', 'um.foto', 'um.correo','um.contrasena', 'um.celular', 'um.contacto_emergencia', 'um.latitud', 'um.longitud','e.carrera','e.facultad')
         ->where('um.correo',$em)
         ->where('um.contrasena',$con)
         ->get();
        return response()->json($usuario);
    }
    

    
}
