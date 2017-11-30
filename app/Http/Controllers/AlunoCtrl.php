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
        $insert->matricular($values);

            return [
                'result'  => true,
                'message' => 'Aluno Matriculado com sucesso!',
            ];

    }

    public function list()
    {
        $search = new Aluno();
        $alunos = $search->get_list();
        return $alunos;

    }

    public function all()
    {
        $search = new Aluno();
        $alunos = $search->all_alunos();
        return $alunos;

    }

}
