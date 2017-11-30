<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use App\Pre_Requisito;
use App\Grade;
use Auth;


class DisciplinaCtrl extends Controller
{

    // FUNÇÕES DE CHARMAR VIEW
    public function index()
    {
    	if (Auth::check()) {
     		return view('painel.disciplinas');
		} else{
			return redirect()->route('login');
		}
    }

    public function indexAdicionar()
    {
    	if (Auth::check()) {
     		return view('painel.disciplinas_adicionar');
		} else{
			return redirect()->route('login');
		}
    }

    public function indexPR()
    {
        if (Auth::check()) {
            return view('painel.disciplinas_pre_requisito');
        } else{
            return redirect()->route('login');
        }
    }
    public function indexAddGrade()
    {
        if (Auth::check()) {
            return view('painel.disciplinas_grade');
        } else{
            return redirect()->route('login');
        }
    }

    // FUNÇÕES FOR REAL
    
    public function adicionar(Request $request)
    {
    	$values = $request->all();
        Disciplina::create($values);

        return [
                'result'  => true,
                'message' => 'Disciplina Cadastrada com sucesso!',
            ]; 
    }

    public function listar()
    {
        $search = new Disciplina();
        $Disciplinas = $search->listar();
        return $Disciplinas;

    }

    public function all()
    {
        $disciplinas = Disciplina::all();
        return $disciplinas;

    }

    public function out_disciplina(Request $request)
    {

        $disc = $request->all();
        
        $search      = new Disciplina();
        $Disciplinas = $search->out_disciplina($disc);
        return $Disciplinas;

    }

    public function adicionar_pre(Request $request)
    {

        $values = $request->all();

        try {

            Pre_Requisito::create($values);
            $err = '';

        }

        catch (\PDOException $e) {

            $err = $e->getCode();

        }


        if ($err == '') {

            return [
                    'result'  => true,
                    'message' => 'Disciplina incluida com sucesso',
                ];

        } else{

            if ($err == 45000) {
                $return = 'A Disciplina 2  já é Pré-requisito<br> da Disciplina 1';
            } else if($err == 45001){
                $return = 'A Disciplina 1  é Pré-requisito<br> da Disciplina 2';
            }else if($err == 45002){
                $return = 'A quantidade Máxima de Pré-requisitos nessa disciplina foi atingida';
            } else{
                $return = $err;
            }


            return [
                    'result'  => false,
                    'message' => $return,
                ];
        }

    }


    public function adicionar_grade(Request $request)
    {
        $values = $request->all();

        try {

            Grade::create($values);
            $err = '';

        }

        catch (\PDOException $e) {

            $err = $e->getCode();

        }


        if ($err == '') {

            return [
                    'result'  => true,
                    'message' => 'Disciplina inserida na Grade do Curso com sucesso!',
                ];

        } else{

            if ($err == 45003) {
                $return = 'Disciplina não inserida<br> O número de horas do curso é maior do que o cadastrado';
            } else if($err == 45004){
                $return = 'Disciplina não inserida<br> O número de créditos do curso é maior do que o cadastrado';
            } else{
                $return = $err;
            }


            return [
                    'result'  => false,
                    'message' => $return,
                ];
        }
    }

}
