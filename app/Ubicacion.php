<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = "ubicacion";
    protected $fillable = ['id','latitud','longitud','ayudante_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
