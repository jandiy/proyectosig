<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Estudiante extends Model
{
    protected $table = "estudiante";
    protected $fillable = [
        'carrera','facultad'
    ];
    public $timestamps=false;
    protected $primaryKey = 'usuario_id';
}
