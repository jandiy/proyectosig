<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEspecialidad extends Model
{
    protected $table = "detalle_especialidad";
    protected $fillable = ['id','ayudante_id','especialidad_id','estado'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
