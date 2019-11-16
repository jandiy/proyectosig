<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTrabajo extends Model
{
    protected $table = "detalle_trabajo";
    protected $fillable = ['id','estado','hora','fecha','nombre','trabajo_id','dtespecialidad_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';  
}
