<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Painel_usuario extends Model
{

    protected $fillable = [
        'username', 'password', 'tipo_usuario',
    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at',
    ];

    public function listar(){

    	$usuarios = DB::table('painel_usuarios')
    				->join('painel_usuario_tipos', 'painel_usuarios.tipo_usuario', '=', 'painel_usuario_tipos.id_tipo')
            		->select('painel_usuarios.id as id', 'painel_usuarios.username as nome', 'painel_usuario_tipos.nome_tipo as funcao')
    				->get();
    	return $usuarios;
    }

}

