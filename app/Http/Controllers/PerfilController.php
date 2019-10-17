<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $webs = DB::select("select u.id, u.name, u.apellido, u.foto, u.email, u.fecha_nacimiento, u.genero
        from users as u
        where u.id=".$user->id);   
        return view('perfiles.index',compact('webs'));
    }
    public function edit(){
        $user=Auth::user();
        return view('perfiles.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'apellido' => 'required',
            'genero'=> 'required', 
            'fecha_nacimiento'=> 'required', 
            
            'password' => 'required|same:confirm-password'                       
        ]);

        $usuario = User::find($id);
        $usuario->name  = $request->input('name');
        $usuario->apellido = $request->input('apellido');
        $usuario->genero = $request->input('genero');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->email= $usuario->email;
        $usuario->estado= 1;
        
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $usuario->foto=$filename;
          }
        $usuario->save();

        return redirect()->route('perfiles.index')
            ->with('success','Perfil Actualizado Exitosamente');    
    }

    public function updateB(Request $request)
    {
        
        $this->validate($request, [
           
            'password' => 'required|same:confirm-password'                       
        ]);

        $user=Auth::user();
        $usuario = User::find($user->id);
        
        $usuario->password = Hash::make($request->input('password'));
        
        $usuario->update();

        return redirect()->route('perfiles.index')
            ->with('success','Contrasena Cambiada Exitosamente');    
    }
}
