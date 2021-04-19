<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $table='casos';
    
    public function ponente(){
           return $this->hasOne(User::class,'id','idPonente'); 
    } 
    
    public function dependencia(){
           return $this->hasOne(Dependencia::class,'id','idDependencia');
    }
    
    public function estatus(){
           return $this->hasOne(Estatus::class,'id','idEstatus');
    }     
    
    public function falta(){
           return $this->hasOne(Falta::class,'id','idFalta');
    }      
           
    public function criterios(){
    	   return $this->belongsToMany(Criterio::class)->withTimestamps();
    }
    
    public function documentos(){
           return $this->hasMany(RepositorioDocumento::class,'idCaso','id');
    }  
    
    public function invitados(){
           return $this->hasMany(InvitadosCaso::class,'idCaso','id');
    } 
    
    public function fuentes(){
           return $this->hasMany(FuentesCaso::class,'idCaso','id');
    }                
}
