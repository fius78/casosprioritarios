<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table='dependencias';

    public function caso(){
           return $this->belongsTo(Caso::class,'idDependencia','id');    
    }    
}
