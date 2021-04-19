<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvitadosCaso extends Model
{
    protected $table='casos_invitado';

    public function caso(){
    	   return $this->belongsTo(Caso::class,'idCaso','id');
    }
}
