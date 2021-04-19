<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $table='faltas';

    public function caso(){
           return $this->belongsTo(Caso::class,'idFalta','id');    
    }    
}
