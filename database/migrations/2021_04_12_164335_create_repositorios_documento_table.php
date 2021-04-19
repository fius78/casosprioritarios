<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriosDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositorios_documento', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('descripcion',250);
            $table->string('documento',250);
            $table->tinyInteger('tipoDocumento')->comment('1=Informe Técnico, 2=Acta, 3=Informe Seguimiento');          
            $table->boolean('validado');
            $table->bigInteger('idCaso')->unsigned();
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
        Schema::dropIfExists('repositorios_documento');
    }
}
