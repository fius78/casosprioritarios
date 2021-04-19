@extends('layouts.app')

@section('content')
<div class="clearfix"></div>

<div class="row">
        
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         
         <div class="x_title">

            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  <h2><small>Listado de Casos Prioritarios</small></h2>                  
               </div>               
            </div>
                        
            <div class="row">
               <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                  &nbsp;&nbsp;                  
                  <a href="{{ route('nuevocaso') }}" class="btn btn-success">
                     <i class="fa fa-plus"></i>&nbsp;Agregar Caso Prioritario
                  </a>
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
                     <th>Folio</th>
                     <th>No Expediente</th>
                     <th>Ponente</th>
                     <th>Estatus</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               
               <tbody>
                  @foreach($casos as $caso)
                  <tr>
                     <td>{{ $caso->folio }}</td>
                     <td>{{ $caso->numeroExpediente }}</td>
                     <td>{{ $caso->ponente->name }}</td>
                     <td>{{ $caso->estatus->descripcion }}</td>  
                     <td>
                        <a href="{{ route('editarcaso', ['id'=>$caso->id]) }}" class="btn btn-warning btn-sm">
                           <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar Caso Prioritario"></i>
                        </a>
                        <a href="{{ route('listafuentes', ['id'=>$caso->id]) }}" class="btn btn-success btn-sm">
                           <i class="fa fa-upload" aria-hidden="true" data-toggle="tooltip" title="Fuentes de información"></i>
                        </a> 
                        <a href="{{ route('listadocumentos', ['id'=>$caso->id]) }}" class="btn btn-info btn-sm">
                           <i class="fa fa-folder-o" aria-hidden="true" data-toggle="tooltip" title="Repositorio de Documentos"></i>
                        </a>                                                
                        <form style="display: inline" method="post" action="{{ route('eliminarcaso', ['id'=>$caso->id]) }}">
                           @method('DELETE')
                           @csrf
                           <button type="submit" name="eliminarCaso" id="eliminarCaso" onclick="" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar Caso Prioritario">
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
