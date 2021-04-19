<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('folio',20)->nullable();;
            $table->string('numeroExpediente',100);
            $table->date('fechaHechos');
            $table->longText('descripcionHechos');
            $table->longText('consideracionCaso');
            $table->integer('idPonente')->unsigned();
            $table->integer('idDependencia')->unsigned();
            $table->integer('idEstatus')->unsigned();
            $table->integer('idFalta')->unsigned();            
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
        Schema::dropIfExists('casos');
    }
}
