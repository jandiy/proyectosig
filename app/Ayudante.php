<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayudante extends Model
{
    protected $table = "ayudante";
    protected $fillable = [
    ];
    public $timestamps=false;
    protected $primaryKey = 'usuario_id';
}
