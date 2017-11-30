<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaAtuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area__atuacaos', function (Blueprint $table) {
            $table->increments('area_id');
            $table->string('area_nome', 100);
            $table->integer('dep_fk')->unsigned();
            $table->foreign('dep_fk')->references('dep_id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area__atuacaos');
    }
}
