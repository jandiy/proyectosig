<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\UsuarioMovil;
use App\Ayudante;
use App\DetalleEspecialidad;
use App\Http\Controllers\Controller;
use Hash;

class AyudanteController extends Controller
{
    public function index()
    {
        $ayudantes = DB::select("select um.id, um.nombre, um.apellido 
        from usuario_movil as um, ayudante as a 
        where um.id=a.usuario_id");   
        return view('ayudantes.index',compact('ayudantes'));
    }

    public function create()
    {
        
        $especialidades = DB::select("select e.id, e.nombre, g.nombre as espe
        from especialidad as e, grupo as g
        where e.estado=1 and e.grupo_id=g.id and g.estado=1");
      
        return view('ayudantes.create',compact('especialidades'));
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
         ->join('ayudante as a','a.usuario_id','=','um.id')
         ->select('um.id', 'um.nombre', 'um.apellido', 'um.foto', 'um.correo','um.contrasena', 'um.celular', 'um.contacto_emergencia', 'um.latitud', 'um.longitud')
         ->where('um.correo',$em)
         ->where('um.contrasena',$con)
         ->get();
        return response()->json($usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
       // $usuario->contrasena = Hash::make($request->input('contrasena'));
        $usuario->genero = $request->input('genero');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->celular= $request->input('celular');
        $usuario->contacto_emergencia= $request->input('contacto_emergencia');
        $usuario->latitud= $request->input('latitud');
        $usuario->longitud= $request->input('longitud');
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $usuario->foto=$filename;
          }
        $usuario->save();
        $ayudante= new Ayudante();
        $ayudante->usuario_id=$usuario->id;
        $time= Carbon::now('America/La_Paz');
        $ayudante->fecha_registro=$time->toDateString();
        $ayudante->estado=1;
        $ayudante->save();
        $detalle= new DetalleEspecialidad();
        $detalle->ayudante_id=$ayudante->usuario_id;
        $detalle->especialidad_id=$request->input('especialidad');
        $detalle->estado=1;
        $detalle->save();

        return redirect()->route('ayudantes.index')
            ->with('success','Ayudante Registrado Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ayudante = UsuarioMovil::find($id);
        $especialidad=DB::select("select e.nombre, g.nombre as nom
        from especialidad as e, detalle_especialidad as de, grupo as g
        where g.id=e.grupo_id and de.especialidad_id=e.id and de.estado=1 and de.ayudante_id=".$id);
        $movil=DB::select("select a.fecha_registro
        from usuario_movil as um, ayudante as a
        where um.id=a.usuario_id and um.id=".$id);

        return view('ayudantes.show',compact('ayudante','especialidad','movil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidades = DB::select("select e.id, e.nombre, g.nombre as espe
        from especialidad as e, grupo as g
        where e.estado=1 and e.grupo_id=g.id and g.estado=1");
        $ayudante=UsuarioMovil::find($id);
         return view('ayudantes.edit',compact('especialidades','ayudante'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $usuario = UsuarioMovil::find($id);
        $usuario->nombre  = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->correo = $request->input('correo');
       // $usuario->contrasena = Hash::make($request->input('contrasena'));
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
           $request->file->storeAs('public/upload',$filename);
           $usuario->foto=$filename;
          }
        $usuario->save();
        
        $detalle=DB::select("select id from detalle_especialidad where ayudante_id=".$id);
        foreach($detalle as $key=>$value ){
            $det=DetalleEspecialidad::find($value->id);
            $det->estado=0;
            $det->update();

        }
        $detalle= new DetalleEspecialidad();
        $detalle->ayudante_id=$id;
        $detalle->especialidad_id=$request->input('especialidad');
        $detalle->estado=1;
        $detalle->save();

        return redirect()->route('ayudantes.index')
            ->with('success','Ayudante Actualizado Exitosamente');   
    }

    
}
