@extends('layouts.app')

@section('content')
<div class="clearfix"></div>

<div class="row">

   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
      
         <div class="x_title">
            
            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  <h3>Actualizar Fuente de Información</h3>
               </div>               
            </div>            
            
            <div class="clearfix"></div>

            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  <h1><small>Información del Caso Prioritario</small></h1>
                  <dl>
                     <dt><h3><small>&nbsp;&nbsp;Folio - Número de Expediente</small></h3></dt>
                     <dd><h4><small>&nbsp;&nbsp;&nbsp;{{ $fuente->caso->folio }} - {{ $fuente->caso->numeroExpediente }}</small></h4></dd>
                     <dt><h3><small>&nbsp;&nbsp;Ponente</small></h3></dt>
                     <dd><h4><small>&nbsp;&nbsp;&nbsp;{{ $fuente->caso->ponente->name }}</small></h4></dd>
                  </dl>
               </div>   
            </div>  

            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
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
               </div>               
            </div>                      
               
            <div class="clearfix"></div>
         </div>
         
         <div class="x_content">
            <br />
            <form name="form-fuente" id="form-fuente" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('actualizarfuente', ['id'=>$fuente->id]) }}">
            @method('PUT')  
            @csrf
            
                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción corta de la fuente de información:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="descripcion" id="descripcion" value="{{ $fuente->descripcion }}" required="required" class="form-control col-md-7 col-xs-12">
                   </div>
                </div>
                
                <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de fuente de información:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">                   
                      <div class="form-check">
                         <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="tipoDocumento1" name="tipoDocumento" value="1" @if ($fuente->tipoDocumento=='1') checked @endif>Archivo
                         </label>
                      </div>
                         
                      <div class="form-check">
                         <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="tipoDocumento2" name="tipoDocumento" value="2" @if ($fuente->tipoDocumento=='2') checked @endif>URL
                         </label>
                      </div>                      
                   </div>
                </div>
                  
                <div class="form-group" @if ($fuente->tipoDocumento=='1') style="display: block;" @else style="display: none;" @endif id="id_archivo">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Proporcione el archivo fuente de información:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="archivoFuente" id="archivoFuente" class="form-control col-md-7 col-xs-12">
                      @if ($fuente->tipoDocumento==1 && $fuente->fuente) 
                          &nbsp;
                           <a href="{{ route('descargafuente', ['id'=>$fuente->id]) }}" class="btn btn-default btn-sm">  
                              <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip"></i>&nbsp;Ver Fuente de Información 
                           </a>                          
                      @endif
                   </div>

                </div>



                <div class="form-group" @if ($fuente->tipoDocumento=='2') style="display: block;" @else style="display: none;" @endif id="id_url">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12">Proporcione la URL a la fuente de información:<span class="required">*</span></label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="urlFuente" value="{{ $fuente->fuente }}" id="urlFuente" class="form-control col-md-7 col-xs-12">
                   </div>
                </div>                
                                                   
                <div class="ln_solid"></div>
                <div class="form-group">
                   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                    
                      <button type="submit" class="btn btn-success">Actualizar</button>
                      <a href="{{ route('listafuentes', ['id'=>$fuente->caso->id]) }}" class="btn btn-default">Cancelar</a>
                   </div>
                </div>
              
            </form>
            
         </div>
            
      </div>
   </div>
</div>
@endsection

@push('jscustom')
<script type="text/javascript">

   $(document).ready(function(){
            
      $('#archivoFuente').prop('required',true);

      $("#tipoDocumento1").click(function(){
         
         $("#id_archivo").css("display", "block");
         $('#archivoFuente').prop('required',true);

         $("#id_url").css("display", "none");         
         $('#urlFuente').prop('required',false); 

      });
   
      $("#tipoDocumento2").click(function(){
         
         $("#id_url").css("display", "block");
         $('#urlFuente').val('');
         $("#id_archivo").css("display", "none");
         $('#archivoFuente').prop('required',false);
         
      });

   });

</script>
@endpush