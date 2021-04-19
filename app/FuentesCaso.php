<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class FuentesCaso extends Model
{
    protected $table='casos_fuente';

    public function caso(){
    	   return $this->belongsTo(Caso::class,'idCaso','id');
    }
}
