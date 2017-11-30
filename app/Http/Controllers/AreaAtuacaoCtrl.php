<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area_Atuacao;
use Auth;

class AreaAtuacaoCtrl extends Controller
{
    public function register(Request $request){

        $values = $request->all();
        Area_Atuacao::create($values);
        
        return [
                'result'  => true,
                'message' => 'Area de Atuação Cadastrada com sucesso!',
            ]; 
    }

    public function listar()
    {
    	$search = new Area_Atuacao();
        $areas  = $search->listar_dashboard();
        return $areas;
    }
}
