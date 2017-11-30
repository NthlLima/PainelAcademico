<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortalAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_alunos', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('login_usuario', 20);
            $table->string('senha_usuario', 80);
            $table->timestamps();
            $table->integer('matricula')->unsigned();
            $table->foreign('matricula')->references('matricula_id')->on('matriculas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portal_alunos');
    }
}
