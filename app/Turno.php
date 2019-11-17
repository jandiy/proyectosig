<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = "turno";
    protected $fillable = ['id','nombre','estado','transporte'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
