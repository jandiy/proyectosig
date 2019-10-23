<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupo";
    protected $fillable = ['id','nombre','estado'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
