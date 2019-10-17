<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UsuarioMovil extends Model
{
    protected $table = "usuario_movil";
    protected $fillable = [
        'nombre','apellido','foto','correo','contrasena','genero','fecha_nacimiento','celular','contacto_emergencia', 'latitud','longitud','estado'
    ];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
