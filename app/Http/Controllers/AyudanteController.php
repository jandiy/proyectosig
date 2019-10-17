<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UsuarioMovil;
use App\Ayudante;
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
        
        return view('ayudantes.create');
    }
    public function login()
    {
        //$ayudante = DB::select("select um.id
       // from usuario_movil as um, ayudante as a
       // where um.id=a.usuario_id");
       $ayudante= DB::select("select id, name from users");

        return response()->json($ayudante);
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
            'genero'=> 'require', 
            'fecha_nacimiento'=> 'required', 
            'celular' => 'required',  
            'contacto_emergencia' => 'required', 
            'marca' => 'required',                     
        ]);

        $usuario = new UsuarioMovil();
        $usuario->nombre  = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria');
        $producto->medida_id = $request->input('medida');
        $producto->marca_id = $request->input('marca');
        $producto->estado ='Disponible';
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $producto->imagen=$filename;
          }
        $producto->save();

        // self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('productos.index')
            ->with('success','Producto Creado Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::get();
        $marcas = Marca::get();
        $medidas = Medida::get();
         return view('productos.edit',compact('categorias','producto','medidas','marcas'));
   
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
            'descripcion' => 'required',
            'cantidad'=> 'required|numeric', 
            'precio'=> 'required|numeric', 
            'categoria' => 'required',  
            'medida' => 'required', 
            'marca' => 'required',                       
        ]);

        $producto = Producto::find($id);
        $producto->nombre  = $request->input('nombre');
        $producto->cantidad = $request->input('cantidad');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria');
        $producto->medida_id = $request->input('medida');
        $producto->marca_id = $request->input('marca');
        $producto->estado ='Disponible';
        if($request->hasFile('file'))
          {

           $filename= time().'_'.$request->file->getClientOriginalName(); 
           $request->file->storeAs('public/upload',$filename);
           $producto->imagen=$filename;
          }
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success','Producto Actualizado Exitosamente');    
    }

    
}
