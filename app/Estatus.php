<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    protected $table='estatus';

    public function caso(){
           return $this->belongsTo(Caso::class,'idEstatus','id');    
    }        
}
