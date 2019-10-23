<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Estudiante extends Model
{
    protected $table = "estudiante";
    protected $fillable = ['carrera','facultad','estado','fecha_registro','usuario_id'];
    public $timestamps=false;
    protected $primaryKey = 'usuario_id';
}
