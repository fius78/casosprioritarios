<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <title>{{ config('app.name', 'Proyecto') }}</title>
   
   <!-- Scripts -->
   <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
   <!--<script src="{{ asset('css/bootstrap.min.css') }}"></script>  -->
   <!--<script src="{{ asset('js/gentelella-custom.js') }}"></script>-->    
   <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
   <link href="{{ asset('vendor/iCheck/skins/flat/aero.css') }}" rel="stylesheet">   
   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   <link href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
   <link href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">    
   <link href="{{ asset('vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">    
   <link href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
   
   <!-- Styles -->
   <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
   <link href="{{ asset('build/css/gentelella-custom.css') }}" rel="stylesheet">
</head>

<body class="nav-md footer_fixed">
   <div class="container body">
      <div class="main_container">
         
         <!-- Columna izquierda de la plantilla -->
         <div class="col-md-3 left_col">
    	    <div class="left_col scroll-view">
		       
		       <div class="navbar nav_title" style="border: 0;">
		          <a href="index.html" class="site_title"><span>Casos Prioritarios</span></a>
		       </div>
		       
		       <div class="clearfix"></div>
		       
		       <!-- Foto y nombre del usuario que se ha logeoado al sistema -->
		       <div class="profile clearfix">
		          <div class="profile_pic">
		          	 <i class="far fa-user-circle"></i>
		          </div>
		          <div class="profile_info">
		             <span>Bienvenido,</span>
		             <h2>John Doe</h2>
		          </div>
		       </div>
		       <br/>
		       <!-- /Foto y nombre del usuario que se ha logeoado al sistema -->
		       
		       <!-- sidebar menu -->
			   <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		          <div class="menu_section">
		             <h3>Menú General</h3>
		             <ul class="nav side-menu">
		                <li>
		                   <a><i class="fa fa-archive"></i> Casos Prioritarios <span class="fa fa-chevron-down"></span></a>
		                   <ul class="nav child_menu">
		                      <li><a href="{{ route('listacasos') }}">Listado</a></li>
		                      <li><a href="{{ route('nuevocaso') }}">Agregar</a></li>
		                   </ul>
		                </li>
		                <li><a><i class="fa fa-book"></i> Catálogo <span class="fa fa-chevron-down"></span></a>
		                   <ul class="nav child_menu">
		                      <li><a href="#">Listado</a></li>
		                      <li><a href="#">Agregar</a></li>
		                   </ul>
		                </li>		                  	                  
		             </ul>
		          </div>						
			   </div>	
		       <!-- /sidebar menu -->

		       <!-- /menu footer buttons -->
		       <div class="sidebar-footer hidden-small">
		          <a data-toggle="tooltip" data-placement="top" title="Settings">
		             <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
		          </a>
		          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
		             <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
		          </a>
		          <a data-toggle="tooltip" data-placement="top" title="Lock">
		             <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
		          </a>
		          <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
		             <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
		          </a>
		       </div>
		       <!--/menu footer buttons -->
		       
		    </div>
		 </div>
		 <!-- /Columna izquierda de la plantilla -->

	     <!-- Columna derecha de la plantilla -->
	     <!-- Menú de navegación posicionado ARRIBA y con opciones a la derecha -->
	     <div class="top_nav">
	        <div class="nav_menu">
	           <nav>
	           	  <!-- icono de menú -->
	              <div class="nav toggle">
	                 <a id="menu_toggle"><i class="fa fa-bars"></i></a>
	              </div>
	              <!-- /icono de menú -->
                  
                  <!-- Opciones del menú, posicionadas a la derecha -->  
	              <ul class="nav navbar-nav navbar-right">
	                 <!-- Opción CERRAR sesión -->
	                 <li class="">
	                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	                       <img src="{{ asset('images/img.jpg')}}" alt="">John Doe
	                       <span class=" fa fa-angle-down"></span>
	                    </a>
	                    
	                    <ul class="dropdown-menu dropdown-usermenu pull-right">
	                       <li>
	                       	  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	                       	     {{ __('Cerrar sesión') }}<i class="fa fa-sign-out pull-right"></i>
	                       	  </a>
	                       	  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </li>
	                    </ul>                        
	                 </li>
                     <!-- /Opción CERRAR sesión -->
                      
	                 <!-- Opción Notificaciones -->
	                 <li role="presentation" class="dropdown">
	                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
	                       <i class="fa fa-envelope-o"></i>
	                       <span class="badge bg-green">2</span>
	                    </a>
	                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
	                       <li>
	                          <a>
	                             <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
	                             <span>
	                                <span>John Smith</span>
	                                <span class="time">3 mins ago</span>
	                             </span>
	                             <span class="message">
	                                Film festivals used to be do-or-die moments for movie makers. They were where...
	                             </span>
	                          </a>
	                       </li>
                            
	                       <li>
	                          <a>
	                             <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
	                             <span>
	                                <span>John Smith</span>
	                                <span class="time">3 mins ago</span>
	                             </span>
	                             <span class="message">
	                                Film festivals used to be do-or-die moments for movie makers. They were where...
	                             </span>
	                          </a>
	                       </li>	                    
	                    </ul>
	                 </li>
	                 <!-- /Opción Notificaciones -->
	                 
	              </ul>
	              <!-- /Opciones del menú, posicionadas a la derecha -->  
	              
	           </nav>
	        </div>			        	
	     </div>
	     <!-- /Menú de navegación posicionado ARRIBA y con opciones a la derecha -->
	     <!-- Columna derecha de la plantilla -->	
         
	     <!-- Área de visualización del contenido -->
	     <div class="right_col" role="main">
	        @yield('content')
	     </div>
         <!-- /Área de visualización del contenido -->

	     <!-- footer content -->
	     <footer>
	        <div class="pull-right">
	            SESAEQROO - Sistema Administrador de Casos Prioritarios
	        </div>
	        <div class="clearfix"></div>
	     </footer>
	     <!-- /footer content -->
    	 	
      </div>
   </div>
   
   <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script> 	
   <script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script> 	
   
   <script src="{{ asset('vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script> 	
   <script src="{{ asset('vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
   
   <script src="{{ asset('vendor/skycons/skycons.js') }}"></script>
   <script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>			
   <script src="{{ asset('build/js/gentelella-custom.js') }}"></script>
   @stack('jscustom');
</body>
</html>

   <script>
        lenguaje = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        };

        $('#datatable').DataTable(
            {
                "language": lenguaje,
                "aProcessing": true,//Activamos el procesamiento del datatables
                "aServerSide": true,//Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip',//Definimos los elementos del control de tabla
                "bDestroy": true,
                "iDisplayLength": 5,//Paginación
                "order": [[0, "desc"]]//Ordenar (columna,orden)
            }
        );
   </script>   