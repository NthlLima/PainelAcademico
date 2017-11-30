<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id_professor');
            $table->integer('fk_pessoa')->unsigned();
            $table->string('matricula', 20);
            $table->string('cef_professor', 20);
            $table->integer('fk_departamento')->unsigned();
            $table->foreign('fk_pessoa')->references('id_pessoa')->on('pessoas');
            $table->foreign('fk_departamento')->references('dep_id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
}
