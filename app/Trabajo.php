<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $table = "trabajo";
    protected $fillable = ['id','estado','hora','fecha','longitudA','latitudA','user_id','emergencia_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';   
}
