<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use Auth;


class AlunoCtrl extends Controller
{
    
    public function index()
    {
    	if (Auth::check()) {
     		return view('painel.alunos');
		} else{
			return redirect()->route('login');
		}
    }

    public function indexMatricula()
    {
        if (Auth::check()) {
            return view('painel.matricula_alunos');
        } else{
            return redirect()->route('login');
        }
    }
    public function indexRematricula()
    {
    	if (Auth::check()) {
     		return view('painel.rematricular_alunos');
		} else{
			return redirect()->route('login');
		}
    }

    public function matricular(Request $request)
    {

    	$values = $request->all();
    	$insert = new Aluno();

    	if ($values["admissao"] == 1) {

    		$insert->matricular($values);
    		return [
                'result'  => true,
                'message' => 'Aluno Matriculado com sucesso!',
            ];
    		
    	} else if($values["admissao"] == 2){

    		if ($values["transf"]) {
    			$insert->transferir($values);
    			return [
                	'result'  => true,
                	'message' => 'Aluno Matriculado com sucesso!',
            	];
    		} else{
    			return [
                	'result'  => false,
                	'message' => 'Faculdade de Origem não encontrada!',
            	];
    		}

    	} else{
    		return [
                'result'  => false,
                'message' => 'Tipo de Admissão não encontrado!',
            ];
    	}

    }

    public function all()
    {
        $search = new Aluno();
        $alunos = $search->all_alunos();
        return $alunos;

    }

}
