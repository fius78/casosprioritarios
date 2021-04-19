@extends('layouts.app')

@section('content')
<div class="clearfix"></div>

<div class="row">
        
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        
         <div class="x_title">
            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  <h1><small>Información del Caso Prioritario</small></h1>
                  <dl>
                     <dt><h3><small>&nbsp;&nbsp;Folio - Número de Expediente</small></h3></dt>
                     <dd><h4><small>&nbsp;&nbsp;&nbsp;{{ $caso->folio }} - {{ $caso->numeroExpediente }}</small></h4></dd>
                     <dt><h3><small>&nbsp;&nbsp;Ponente</small></h3></dt>
                     <dd><h4><small>&nbsp;&nbsp;&nbsp;{{ $caso->ponente->name }}</small></h4></dd>
                  </dl>
               </div>   
            </div>            

            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  <h2><small>Listado de Documentos del Repositorio</small></h2>
               </div>               
            </div>

            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  &nbsp;&nbsp;                  
                  <a href="{{ route('nuevodocumento', ['id'=>$caso->id]) }}" class="btn btn-success">
                     <i class="fa fa-plus"></i>&nbsp;Agregar Documento al Repositorio
                  </a>
                  <a href="{{ route('listacasos') }}" class="btn btn-default">Regresar al Listado de Casos Prioritarios</a>
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
            
            @if(Session::has('flash_message'))
            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="alert alert-info">
                     <ul>
                        {{Session::get('flash_message')}}
                     </ul>
                  </div>
               </div>   
            </div>
            @endif             

            <div class="clearfix"></div>
         </div>

         <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
               
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Descripción</th>
                     <th>Tipo Documento</th>                     
                     <th>Validado</th>                     
                     <th>Acciones</th>
                  </tr>
               </thead>
               
               <tbody>
                  @php $c=1; @endphp
                  @foreach($caso->documentos as $documento)
                  <tr>
                     <td>{{ $c }}</td>
                     <td>{{ $documento->descripcion }}</td>

                     @if ($documento->tipoDocumento === 1)
                        <td>Informe Técnico</td>
                     @elseif ($documento->tipoDocumento === 2)
                        <td>Acta</td>
                     @elseif ($documento->tipoDocumento === 3)
                        <td>Informe Seguimiento</td>
                     @endif
                     
                     @if ($documento->validado === 1)
                        <td>SÍ</td>
                     @else
                        <td>NO</td>
                     @endif    
                                          
                     <td>
                        <a href="{{ route('editardocumento', ['id'=>$documento->id]) }}" class="btn btn-warning btn-sm">
                           <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar Documento"></i>
                        </a>

                        <a href="{{ route('descargadocumento', ['id'=>$documento->id]) }}" class="btn btn-success btn-sm">  
                           <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Ver Documento"></i> 
                        </a>
                        
                        <form style="display: inline" method="post" action="{{ route('eliminardocumento', ['id'=>$documento->id]) }}">
                           @method('DELETE')
                           @csrf
                           <button type="submit" name="eliminarDocumento" id="eliminarDocumento" onclick="" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar Documento">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                           </button>
                        </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         
      </div>                   
   </div>

</div>
@endsection

@push('jscustom')
<script type="text/javascript">
/*  $(document).ready(function(){
      
      if (confirm("¿Desea realizar la eliminación?")){
         alert("prueba");
      }
  });*/
</script>
@endpush
