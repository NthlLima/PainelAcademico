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
        $insert = new Turma();

        try {

            $insert->adicionar($values);
            $err = '';

        }

        catch (\PDOException $e) {

            $err = $e->getCode();

        }

        if ($err == '') {

            return [
                    'result'  => true,
                    'message' => 'Turma incluida com sucesso',
                ];

        } else{

            if ($err == 45005) {
                $return = 'Os 2 horários não podem ser no mesmo dia';
            } else {
                $return = $err;
            }


            return [
                    'result'  => false,
                    'message' => $return,
                ];
        }
        
    }
}
