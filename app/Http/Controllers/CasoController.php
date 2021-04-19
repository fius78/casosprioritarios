<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;
use App\Estatus;
use App\Criterio;
use App\Falta;
use App\Dependencia;
use App\CasosCriterios;

class CasoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //Obtengo el Identificador (id) del usuario logeado
           $id=\Auth::user()->id;

           //Obtengo los casos del usuario logeado
           $casos=Caso::where('idPonente','=',$id)->orderBy('id','desc')->get();
           
           //Invoco la vista "lista" dentro de la carpeta "caso" y le envío $casos
           return view('caso.lista')->with(compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           //Obtengo todos los tipos de criterios activos    
           $criterios=Criterio::where('estatus','=','1')->orderBy('id','asc')->get();           
                        
           //Obtengo todos los tipos de faltas activos
           $faltas=Falta::where('estatus','=','1')->orderBy('id','asc')->get();  

           //Obtengo todos los tipos de dependencias activos
           $dependencias=Dependencia::where('estatus','=','1')->orderBy('descripcion','asc')->get();   
           
           return view('caso.nuevo')->with(compact('criterios','faltas','dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
            //Obtenemos el "id" del usuario que registra el caso, quien será el ponente del caso
            $idPonente=\Auth::user()->id;
            
            //Guardo los datos que llegan  del request en la tabla de "casos"
            $caso=new Caso();
            $caso->numeroExpediente=$request->numeroExpediente;
            $caso->fechaHechos=$request->fechaHechos;
            $caso->descripcionHechos=$request->descripcionHechos;
            $caso->consideracionCaso=$request->consideracionCaso;
            $caso->idPonente=$idPonente;
            $caso->idEstatus='1';
            $caso->idDependencia=$request->idDependencia;
            $caso->idFalta=$request->idFalta;
            $caso->save();

            //Armamos el folio
            $folio=str_pad($caso->id, 10, "0", STR_PAD_LEFT);

            //Guardamos el folio en la tabla de casos prioritarios
            $casofolio = Caso::find($caso->id);
            $casofolio->folio=$folio; 
            $casofolio->save();
                        
            //Guardo los criterios seleccionados en la tabla pivote
            $caso->criterios()->sync($request->idCriterio);
            
            //Retorno el control a la vista "listacasos"
            return redirect()->route('listacasos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           //Obtengo los datos del caso
           $caso = Caso::find($id);

           //Obtengo todos los tipos de criterios activos
           $estatus=Estatus::where('estatus','=','1')->orderBy('id','asc')->get();  

           //Obtengo todos los tipos de criterios activos
           $criterios=Criterio::where('estatus','=','1')->orderBy('id','asc')->get();           
                        
           //Obtengo todos los tipos de faltas activos
           $faltas=Falta::where('estatus','=','1')->orderBy('id','asc')->get();  

           //Obtengo todos los tipos de dependencias activos
           $dependencias=Dependencia::where('estatus','=','1')->orderBy('descripcion','asc')->get();             

           return view('caso.editar')->with(compact('caso','estatus','criterios','faltas','dependencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            //Actualizo los datos del caso con la información que llega del request 
            $caso=Caso::find($id);
            $caso->numeroExpediente=$request->numeroExpediente;
            $caso->fechaHechos=$request->fechaHechos;
            $caso->descripcionHechos=$request->descripcionHechos;
            $caso->consideracionCaso=$request->consideracionCaso;            
            $caso->idEstatus=$request->idEstatus;
            $caso->idDependencia=$request->idDependencia;
            $caso->idFalta=$request->idFalta;
            $caso->save();
            
            //Borramos los criterios del caso, para guardar la nueva selección que llega del formulario
            //CasosCriterios::where('caso_id','=',$id)->delete();   //tambíen puede ser de esta manera
            $caso->criterios()->detach(); 

            //Guardo en la tabla pivote, los criterios del caso que llegan con el request
            $caso->criterios()->sync($request->idCriterio);            

            return redirect()->route('listacasos');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $caso=Caso::find($id);

        /*Nota se debe borrar las fuentes de información del caso antes de borrarlo (al parecer es un ciclo)*/
        
        $caso->criterios()->detach();

        $caso->delete(); 

        \Session::flash('flash_message','¡La información ha sido eliminada!');        
        return redirect()->route('listacasos');
    }

}
