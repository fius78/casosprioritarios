@extends('layouts.app')

@section('content')
<div class="clearfix"></div>
<div class="row">

   <div class="col-md-12 col-sm-12 col-xs-12">   
      <div class="x_panel">
         
         <div class="x_title">
            <h4>Actualizar Información del Caso Prioritario</h4>
            <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                     <li><a href="#">Settings 1</a></li>
                     <li><a href="#">Settings 2</a></li>
                  </ul>
               </li>
               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
         </div>
         
         <div class="x_content">
            <br />
            <form name="form-caso" id="form-caso" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('actualizarcaso', ['id'=>$caso->id]) }}">
            @method('PUT')
            @csrf
                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Número de expediente:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="numeroExpediente" value="{{ $caso->numeroExpediente }}" id="numeroExpediente" required="required" class="form-control col-md-7 col-xs-12">
                   </div>
                </div>

                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">¿Fecha en que ocurrierón los hechos?:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="fechaHechos" value="{{ $caso->fechaHechos }}" id="fechaHechos" required="required" class="form-control col-md-7 col-xs-12">
                   </div>
                </div>                
                
                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción de los hechos:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea class="form-control col-md-7 col-xs-12" name="descripcionHechos" id="descripcionHechos" rows="6" required="required">{{ $caso->descripcionHechos }}</textarea>               
                   </div>
                </div>

                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Consideraciones del caso:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea class="form-control col-md-7 col-xs-12" name="consideracionCaso" id="consideracionCaso" rows="6" required="required">{{ $caso->consideracionCaso }}</textarea>               
                   </div>
                </div>

                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Estatus:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" id="idEstatus" name="idEstatus" required="required">
                         @foreach($estatus as $estatu)

                            @if($estatu->id === $caso->idEstatus)
                               <option value="{{ $estatu->id }}" selected>{{ $estatu->descripcion }}</option>
                            @else
                               <option value="{{ $estatu->id }}">{{ $estatu->descripcion }}</option>
                            @endif
                               
                         @endforeach
                      </select>                                   
                   </div>
                </div>                

                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Criterio de viabilidad:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <select multiple class="form-control col-md-7 col-xs-12" id="idCriterio" name="idCriterio[]" required="required">
                         @foreach($criterios as $criterio)
                            
                            @php $activo=0; @endphp
                            @foreach($caso->criterios as $item)
                               
                               @if($criterio->id === $item->pivot->criterio_id)
                                  @php $activo=1; @endphp
                               @endif   

                            @endforeach


                            @if($activo==1)
                               <option value="{{ $criterio->id }}" selected>{{ $criterio->descripcion }}</option>
                            @else
                               <option value="{{ $criterio->id }}">{{ $criterio->descripcion }}</option> 
                            @endif

                         @endforeach
                      </select>                                   
                   </div>
                </div>

                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Acción incurrida:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" id="idFalta" name="idFalta" required="required">
                         @foreach($faltas as $falta)

                            @if($falta->id === $caso->idFalta)
                               <option value="{{ $falta->id }}" selected>{{ $falta->descripcion }}</option>
                            @else
                               <option value="{{ $falta->id }}">{{ $falta->descripcion }}</option>
                            @endif
                               
                         @endforeach
                      </select>                                   
                   </div>
                </div>

                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Ente público donde se sucitaron los hechos:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" id="idDependencia" name="idDependencia" required="required">
                         @foreach($dependencias as $dependencia)
                            
                            @if($dependencia->id === $caso->idDependencia)
                               <option value="{{ $dependencia->id }}" selected>{{ $dependencia->descripcion }}</option>
                            @else
                               <option value="{{ $dependencia->id }}">{{ $dependencia->descripcion }}</option>
                            @endif                         
                         
                         @endforeach
                      </select>                                   
                   </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                      
                      <button type="submit" class="btn btn-success">Actualizar</button>
                      <a href="{{ route('listacasos') }}" class="btn btn-default">Cancelar</a>
                   </div>
                </div>                  
            </form>
         </div>

      </div>
   </div>
   
</div>
@endsection
