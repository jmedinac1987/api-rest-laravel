<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {

            $table->increments('id');                        
            $table->string('titulo',100);
            $table->string('genero',100);
            $table->string('director',100);
            $table->date('fechaEstreno');
            $table->double('precio', 20, 2);
            $table->text('sipnosis');
            $table->string('formato_portada',100);
            $table->string('nombre_portada',100);
            $table->longText('portada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
