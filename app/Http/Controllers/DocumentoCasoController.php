<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Caso;
use App\RepositorioDocumento;

class DocumentoCasoController extends Controller
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
           return view('documento.lista')->with(compact('caso'));
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
           
           return view('documento.nuevo')->with(compact('caso'));
           
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
            $documento=new RepositorioDocumento();
            $documento->descripcion=$request->descripcion;
            $documento->tipoDocumento=$request->tipoDocumento;
            
            if ($request->archivoDocumento)
               $documento->documento=$request->archivoDocumento->store('public/repositorioDocumentos');
                                                      
            $documento->idCaso=$id;
            $documento->save();                    
            
            return redirect()->route('listadocumentos',$id);
            
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
           $documento = RepositorioDocumento::find($id);

           return view('documento.editar')->with(compact('documento'));
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
            $documento=RepositorioDocumento::find($id);
            $documento->descripcion=$request->descripcion;
            $documento->tipoDocumento=$request->tipoDocumento;

            if( Storage::exists($documento->documento) ) 
               Storage::delete($documento->documento);            
    
            if ($request->archivoDocumento)                  
               $documento->documento=$request->archivoDocumento->store('public/repositorioDocumentos');
                             
            $documento->validado=$request->validado;
            
            $documento->save();                  
            
            return redirect()->route('listadocumentos',$documento->caso->id); 
                    
    }


    /**
     * Download.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
         $documento=RepositorioDocumento::find($id);

         return Storage::download($documento->documento);
            
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
        $documento=RepositorioDocumento::find($id);
        $idCaso=$documento->caso->id;
        
        if( Storage::exists($documento->documento) ) 
           Storage::delete($documento->documento);            
         
        $documento->delete();
        \Session::flash('flash_message','¡La información ha sido eliminada!');        
        
        return redirect()->route('listadocumentos',$idCaso);
        
    }
    
}
