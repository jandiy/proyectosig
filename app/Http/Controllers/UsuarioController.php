<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $webs = DB::select("select u.id, u.name, u.apellido, u.foto, u.email, u.fecha_nacimiento
        from users as u
        where u.estado=1");   
        return view('webs.index',compact('webs'));
    }

    

    public function create()
    {
        
        return view('webs.create');
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
            'name' => 'required',
            'apellido' => 'required',
            'genero'=> 'required', 
            'fecha_nacimiento'=> 'required', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password'                 
        ]);

        $usuario = new User();
        $usuario->name  = $request->input('name');
        $usuario->apellido = $request->input('apellido');
        $usuario->genero = $request->input('genero');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->email= $request->input('email');
        $usuario->estado= 1;
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $usuario->foto=$filename;
          }
        $usuario->save();

        // self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('webs.index')
            ->with('success','Usuario Web Creado Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $web = User::find($id);
         return view('webs.edit',compact('web'));
   
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
            'name' => 'required',
            'apellido' => 'required',
            'genero'=> 'required', 
            'fecha_nacimiento'=> 'required', 
            'email' => 'required',
            'password' => 'required|same:confirm-password'                       
        ]);

        $usuario = User::find($id);
        $usuario->name  = $request->input('name');
        $usuario->apellido = $request->input('apellido');
        $usuario->genero = $request->input('genero');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->email= $request->input('email');
        $usuario->estado= 1;
        
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $usuario->foto=$filename;
          }
        $usuario->save();

        return redirect()->route('webs.index')
            ->with('success','Usuario Web Actualizado Exitosamente');    
    }
    public function destroy($id)
    {
        $user= User::find($id);
        $user->estado=0;
        $user->update();
        return redirect()->route('webs.index')
            ->with('success','Usuario Web Borrado Exitosamente');
    }
}
