<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use Auth;


class ProfessorCtrl extends Controller
{
    public function index(){

     	if (Auth::check()) {
     		return view('painel.professor');
		} else{
			return redirect()->route('login');
		}
    } 

    public function adicionar(){

        if (Auth::check()) {
            return view('painel.adicionar_professor');
        } else{
            return redirect()->route('login');
        }
    }

    public function cadastrar(){

        if (Auth::check()) {
            return view('painel.cadastrar_professor');
        } else{
            return redirect()->route('login');
        }
    }

    
    public function info(){

     	if (Auth::check()) {
     		return view('painel.info_professor');
		} else{
			return redirect()->route('login');
		}
    }

    public function register(Request $request){

        $dados = $request->all();

        $insert = new Professor();
        $result = $insert->register($dados);

        if (count($result) == 0) {
            $return = [
                'result'  => true,
                'message' => 'Professor Cadastrado com sucesso!',
            ];
        } else{
            $return = [
                'result'  => false,
                'message' => $result,
            ];
        }

        return $return;
    }

    public function inserir(Request $request){

        $dados = $request->all();

        $result = Professor::create($dados);

        if ($result == true) {
            $return = [
                'result'  => true,
                'message' => 'Professor Cadastrado com sucesso!',
            ];
        } else{
            $return = [
                'result'  => false,
                'message' => $result,
            ];
        }

        return $return;
    }

    public function listar(){
        $search = new Professor();
        $profs  = $search->listar();
        return $profs;
    }
    public function listarinfo(Request $request){

        $id = $request->all();

        $search = new Professor();
        $prof   = $search->info($id[0]);
        return $prof;
    }

    public function possivel_coordenador(Request $request)
    {
        $area   = $request->all();
        $search = new Professor();
        $profs  = $search->possivel_coordenador($area);
        return $profs;
    }
    public function by_departamento(Request $request)
    {
        $dep    = $request->all();
        $search = new Professor();
        $profs  = $search->by_departamento($dep);
        return $profs;
    }
}
