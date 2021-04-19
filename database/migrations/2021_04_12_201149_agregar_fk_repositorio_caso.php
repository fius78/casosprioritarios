<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarFkRepositorioCaso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repositorios_documento', function (Blueprint $table) {
                $table->foreign('idCaso')->references('id')->on('casos')->onDelete('no action');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repositorios_documento', function (Blueprint $table) {
                $table->dropForeign(['idCaso']);
        });         
    }
}
