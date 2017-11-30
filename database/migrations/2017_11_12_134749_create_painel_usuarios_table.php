<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePainelUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('painel_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50);
            $table->integer('tipo_usuario')->unsigned();
            $table->string('password', 80);
            $table->timestamps();
            $table->rememberToken();
            $table->unique('username');
            $table->foreign('tipo_usuario')->references('id_tipo')->on('painel_usuario_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('painel_usuarios');
    }
}
