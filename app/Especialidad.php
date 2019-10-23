<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = "especialidad";
    protected $fillable = ['id','nombre','grupo_id','estado'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
