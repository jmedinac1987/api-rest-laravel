<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{	
	//con esto indicamos que columnas de la base de datos pueden ser editadas
    protected $fillable = ['titulo', 'genero', 'director', 'fechaEstreno', 'precio', 'sipnosis', 'formato_portada', 'nombre_portada' , 'portada'];
}
