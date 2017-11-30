<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use Auth;

class PessoaCtrl extends Controller
{
    public function listar_nao_professor(){

    	$load = new Pessoa();
    	$pessoas = $load->nao_professor();
    	return $pessoas;

    }
}
