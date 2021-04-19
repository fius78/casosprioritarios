<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepositorioDocumento extends Model
{
    protected $table='repositorios_documento';

    public function caso(){
    	   return $this->belongsTo(Caso::class,'idCaso','id');
    }
}
