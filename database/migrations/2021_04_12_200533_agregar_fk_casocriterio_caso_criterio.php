<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarFkCasocriterioCasoCriterio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caso_criterio', function (Blueprint $table) {
                $table->foreign('caso_id')->references('id')->on('casos')->onDelete('no action');
                $table->foreign('criterio_id')->references('id')->on('criterios')->onDelete('no action');
        });         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caso_criterio', function (Blueprint $table) {
                $table->dropForeign(['caso_id']);
                $table->dropForeign(['criterio_id']);
        });    
    }
}
