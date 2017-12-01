<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use Auth;

class TurmasCtrl extends Controller
{
    public function index(){

     	if (Auth::check()) {
     		return view('painel.turmas');
		} else{
			return redirect()->route('login');
		}
    }

    public function indexAdicionar(){

        if (Auth::check()) {
            return view('painel.turmas_adicionar');
        } else{
            return redirect()->route('login');
        }
    }


    public function adicionar(Request $request){

        $values = $request->all();
        Turma::create($values);

        return [
                'result'  => true,
                'message' => 'Turma Cadastrada com sucesso!',
            ];
    }
}
