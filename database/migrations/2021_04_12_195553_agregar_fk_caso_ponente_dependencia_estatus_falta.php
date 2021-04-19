<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarFkCasoPonenteDependenciaEstatusFalta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casos', function (Blueprint $table) {
                $table->foreign('idPonente')->references('id')->on('users')->onDelete('no action');
                $table->foreign('idDependencia')->references('id')->on('dependencias')->onDelete('no action');
                $table->foreign('idEstatus')->references('id')->on('estatus')->onDelete('no action');
                $table->foreign('idFalta')->references('id')->on('faltas')->onDelete('no action');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casos', function (Blueprint $table) {
                $table->dropForeign(['idPonente']);
                $table->dropForeign(['idDependencia']);
                $table->dropForeign(['idEstatus']);
                $table->dropForeign(['idFalta']);
        });        
    }
}
