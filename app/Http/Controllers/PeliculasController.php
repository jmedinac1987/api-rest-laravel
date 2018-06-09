<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pelicula;
use App\Http\Requests\PeliculaStoreRequest;
use App\Http\Requests\PeliculaUpdateRequest;

use Illuminate\Support\Facades\Response;


class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
       $peliculas = Pelicula::latest('created_at')->get();//obtiene todos los datos ordenados por fecha de creación
       $response = Response::json($peliculas,200);
       return $response;       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculaStoreRequest $request)
    {
        if ( (!$request->formato_portada) || (!$request->nombre_portada)) {
            $comodinFormatoPortada = "Sin Archivo Seleccionado" ;
            $comodinNombrePortada = "Sin Archivo Seleccionado";
        }
        else
        {
            $comodinFormatoPortada = $request->formato_portada;
            $comodinNombrePortada = $request->nombre_portada;   
        }

       
        $pelicula = new Pelicula(array(
            'titulo' => trim($request->titulo),
            'genero' => trim($request->genero),
            'director' => trim($request->director),
            'fechaEstreno' => trim($request->fechaEstreno),
            'precio' => trim($request->precio),
            'sipnosis' => trim($request->sipnosis),            
            'formato_portada' => trim($comodinFormatoPortada),
            'nombre_portada' => trim($comodinNombrePortada),
            'portada' => addslashes($request->portada)
        ));

        $pelicula->save();

        $message = "Su película ha sido añadida de forma correcta";

        $response = Response::json([
                'message' => $message,
                'pelicula' => $pelicula
        ],201);

        return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula= Pelicula::find($id);

        if(!$pelicula){
            return Response::json([
                'error' => [
                'message' => "No se ha encontrado la pelicula."
                ]
                ], 404);
        }

        return Response::json($pelicula, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeliculaUpdateRequest $request, $id)
    {

        if ( (!$request->formato_portada) || (!$request->nombre_portada)) {
            $comodinFormatoPortada = "Sin Archivo Seleccionado" ;
            $comodinNombrePortada = "Sin Archivo Seleccionado";
        }
        else
        {
            $comodinFormatoPortada = $request->formato_portada;
            $comodinNombrePortada = $request->nombre_portada;   
        }

        $pelicula= Pelicula::find($id);

        if(!$pelicula){
            return Response::json([
                'error' => [
                'message' => "No se ha encontrado la pelicula."
                ]
                ], 404);
        }        
        
        $pelicula->titulo = trim($request->titulo);
        $pelicula->genero = trim($request->genero);
        $pelicula->director = trim($request->director);
        $pelicula->fechaEstreno = trim($request->fechaEstreno);
        $pelicula->precio = trim($request->precio);
        $pelicula->sipnosis = trim($request->sipnosis);
        $pelicula->formato_portada = trim($comodinFormatoPortada);
        $pelicula->nombre_portada = trim($comodinNombrePortada);
        $pelicula->portada = addslashes($request->portada);
        
        $pelicula->save();

        $message = "La película ha sido editada de forma correcta";

        $response = Response::json([
                'message' => $message,
                'pelicula' => $pelicula
        ],201);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula= Pelicula::find($id);

        if(!$pelicula){
            return Response::json([
                'error' => [
                'message' => "No se ha encontrado la pelicula."
                ]
                ], 404);
        }
        $pelicula->delete();

        $message = "La película ha sido eliminada de forma correcta";

        $response = Response::json([
                'message' => $message,
                'pelicula' => $pelicula
        ],201);

        return $response;
    }    
}
