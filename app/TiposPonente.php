<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposPonente extends Model
{
    protected $table='tipos_ponente';
    //protected $primaryKey='id';

    public function user(){
    	   return $this->belongsTo(User::class,'idTipo','id');    
    }   
}
