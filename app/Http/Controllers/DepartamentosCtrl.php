<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use Auth;

class DepartamentosCtrl extends Controller
{
    public function index(){

     	if (Auth::check()) {
     		return view('painel.departamentos');
		} else{
			return redirect()->route('login');
		}
    }

    public function register(Request $request){
    	$values = $request->all();
        Departamento::create($values);
    	
    	return [
                'result'  => true,
                'message' => 'Departamento Cadastrado com sucesso!',
            ]; 
    }

    public function listar(){
        $search = new Departamento();
        $deps   = $search->listar_dashboard();
        return $deps;
    }

    public function sem_area_atuacao(){
        $search = new Departamento();
        $deps   = $search->sem_area_atuacao();
        return $deps;
    }

}
