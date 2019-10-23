<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayudante extends Model
{
    protected $table = "ayudante";
    protected $fillable = ['usuario_id','fecha_registro','estado'];
    public $timestamps=false;
    protected $primaryKey = 'usuario_id';
}
