<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Caso;
use App\FuentesCaso;

class FuenteCasoController extends Controller 
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
    public function index($id)
    {
           //Obtengo los datos del caso y por la relación existente llegan los datos de las Fuentes de información del caso  	   
           $caso = Caso::find($id);

           
           //Invoco la vista "lista" dentro de la carpeta "fuente" y le envío $caso
           return view('fuente.lista')->with(compact('caso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
           //Obtengo los datos del caso 	   
           $caso = Caso::find($id);
           
           return view('fuente.nuevo')->with(compact('caso'));
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
           
            //Guardo los datos que llegan  del request en la tabla de "casos"
            $fuente=new FuentesCaso();
            $fuente->descripcion=$request->descripcion;
            $fuente->tipoDocumento=$request->tipoDocumento;
            
            if ($request->tipoDocumento == '1') //Cuando la fuente es un Archivo
            {   
               if ($request->archivoFuente)
                  //Storage::put('file.jpg', $contents, 'public');
                  $fuente->fuente=$request->archivoFuente->store('public/fuentesCasos');
                             
            } else if ($request->tipoDocumento == '2') //Cuando la fuente es un URL
               $fuente->fuente=$request->urlFuente;	
             
              
            $fuente->idCaso=$id;
            $fuente->save();                    
            
            return redirect()->route('listafuentes',$id);
            
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
           $fuente = FuentesCaso::find($id);

           return view('fuente.editar')->with(compact('fuente'));
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
            $fuente=FuentesCaso::find($id);
            $fuente->descripcion=$request->descripcion;
            $fuente->tipoDocumento=$request->tipoDocumento;

            if( Storage::exists($fuente->fuente) ) 
               Storage::delete($fuente->fuente);            
    
            if ($request->tipoDocumento == '1') //Cuando la fuente es un Archivo
            {                    
               if ($request->archivoFuente)                  
                  $fuente->fuente=$request->archivoFuente->store('public/fuentesCasos');
                             
            } else if ($request->tipoDocumento == '2') //Cuando la fuente es un URL
               $fuente->fuente=$request->urlFuente;
            
            $fuente->save();                  
            
            return redirect()->route('listafuentes',$fuente->caso->id);            
                    
    }


    /**
     * Download.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
         $fuente=FuentesCaso::find($id);

         return Storage::download($fuente->fuente);
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //Actualizo los datos del caso con la información que llega del request 
        $fuente=FuentesCaso::find($id);
        $idCaso=$fuente->caso->id;
        
        if( Storage::exists($fuente->fuente) ) 
           Storage::delete($fuente->fuente);            
         
        $fuente->delete();
        \Session::flash('flash_message','¡La información ha sido eliminada!');        
        
        return redirect()->route('listafuentes',$idCaso);
        
    }


}
