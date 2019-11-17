<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTurno extends Model
{
    protected $table = "detalle_turno";
    protected $fillable = ['id','hora_inicio','hora_fin','estado','fecha_inicio','fecha_fin','turno_id','dt_espec'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
