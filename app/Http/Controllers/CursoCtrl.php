<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use Auth;


class CursoCtrl extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
     		return view('painel.cursos');
		} else{
			return redirect()->route('login');
		}
    }

    public function indexAdicionar()
    {
    	if (Auth::check()) {
     		return view('painel.adicionar_curso');
		} else{
			return redirect()->route('login');
		}
    }

    public function register(Request $request)
    {
        $values = $request->all();
        Curso::create($values);
        
        return [
                'result'  => true,
                'message' => 'Curso Cadastrado com sucesso!',
            ];
    }

    public function listar()
    {
        $search = new Curso();
        $cursos = $search->listar();
        return $cursos;

    }
    
    public function all()
    {
        $cursos = Curso::all();
        return $cursos;

    }    


    public function by_departamento(Request $request)
    {
        $value  = $request->all();
        $search = new Curso();
        $cursos = $search->by_departamento($value);
        return $cursos;
    }
}
