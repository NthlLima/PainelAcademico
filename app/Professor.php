<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Professor extends Model
{

    public $timestamps  = false;
    protected $fillable = [
        'fk_pessoa', 'cef_professor', 'fk_departamento',
    ];

    public function register($values){
        $retorno = DB::select('call add_professor ("'.$values["pnome"].'", "'.$values["unome"].'", "'.$values["email"].'", "'.$values["cpf"].'", "'.$values["rua"].'", "'.$values["bairro"].'", "'.$values["cidade"].'", "'.$values["estado"].'", "'.$values["cep"].'", "'.$values["telefone"].'", "'.$values["cef"].'", "'.$values["dep"].'")');

        return $retorno;
    }

    public function listar(){

        $profs = DB::table('professors')
                    ->groupBy('professors.id_professor')
                    ->join('pessoas', 'pessoas.id_pessoa', '=', 'professors.fk_pessoa')
                    ->join('departamentos', 'departamentos.dep_id', '=', 'professors.fk_departamento')
                    ->leftJoin('disciplinas','disciplinas.professor','=','professors.id_professor')
                    ->leftJoin('turmas','turmas.turma_disciplina','=','disciplinas.disciplina_id')
                    ->select('professors.id_professor as id',DB::raw('CONCAT(pessoas.primeiro_nome , " ", pessoas.ultimo_nome) as nome') , 'professors.matricula as mat', 'professors.cef_professor as cef', 'departamentos.dep_nome as dep', DB::raw('COUNT(disciplinas.disciplina_id) as Disciplinas'), DB::raw('COUNT(turmas.turma_id) as Turmas'))
                    ->get();
        return $profs; 
    }


    public function info($id){

    	$prof = DB::table('professors as pf')
                    ->join('pessoas as p', 'p.id_pessoa', '=', 'pf.fk_pessoa')
                    ->join('enderecos as e', 'e.fk_pessoa', '=', 'p.id_pessoa')
                    ->join('telefones as t', 't.fk_pessoa', '=', 'p.id_pessoa')
                    ->join('departamentos as d', 'd.dep_id', '=', 'pf.fk_departamento')
                    ->select(DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as nome'), 'p.email_pessoa as email', 'p.cpf_pessoa as CPF', 'e.ende_rua as rua' , 'e.ende_bairro as bairro' , 'e.ende_cidade as cidade' , 'e.ende_estado as estado' , 'e.ende_cep as CEP' , 't.telefone as telefone' , 'pf.matricula as mat', 'pf.cef_professor as cef', 'd.dep_nome as dep')
                    ->where('pf.id_professor' , $id)
    				->get();
    	return $prof; 
    }

    public function possivel_coordenador($area)
    {
        $prof = DB::table('professors as pf')
                    ->join('pessoas as p', 'p.id_pessoa', '=', 'pf.fk_pessoa')
                    ->join('area__atuacaos as a', 'a.dep_fk', '=', 'pf.fk_departamento')
                    ->leftJoin('cursos as c','c.coordenador','=','pf.id_professor')
                    ->select('pf.matricula as matricula', DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as nome'), 'pf.id_professor as id')
                    ->where([
                                ['c.coordenador' , NULL],
                                ['a.area_id', $area]
                            ])
                    ->get();
        return $prof;

    }
    public function by_departamento($dep)
    {
        $prof = DB::table('professors as pf')
                    ->join('pessoas as p', 'p.id_pessoa', '=', 'pf.fk_pessoa')
                    ->join('departamentos as d', 'd.dep_id', '=', 'pf.fk_departamento')
                    ->select('pf.matricula as matricula', DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as nome'), 'pf.id_professor as id')
                    ->where([
                                ['pf.fk_departamento', $dep]
                            ])
                    ->get();
        return $prof;

    }
}
