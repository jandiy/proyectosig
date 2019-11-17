<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTurno extends Model
{
    protected $table = "detalle_turno";
    protected $fillable = ['id','nombre','estado','transporte'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
