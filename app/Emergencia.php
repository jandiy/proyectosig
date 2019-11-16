<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
    protected $table = "emergencia";
    protected $fillable = ['id','estado','hora','fecha','longitud','latitud','user_id','estudi_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';   
}
