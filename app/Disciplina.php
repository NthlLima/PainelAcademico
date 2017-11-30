<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Disciplina extends Model
{
    public $timestamps  = false;
    protected $fillable = [
        'disciplina_nome', 'ementa', 'num_horas', 'num_creditos', 'professor', 'departamento',
    ];

    public function listar(){
    	$list = DB::table('disciplinas as d')
                ->join('professors as pf', 'pf.id_professor', '=', 'd.professor')
                ->join('pessoas as p', 'p.id_pessoa', '=', 'pf.fk_pessoa')
                ->join('departamentos as dp', 'dp.dep_id', '=', 'd.departamento')
                ->leftJoin('pre__requisitos as pr', 'pr.disciplina', '=', 'd.disciplina_id')
                ->leftJoin('disciplinas as ds', 'ds.disciplina_id', '=', 'pr.pre_requisito')
    			->select('d.disciplina_id as id', 
                         'd.disciplina_nome as nome',
                         'd.num_horas as horas',
                         'd.num_creditos as creditos',
                         DB::raw('CONCAT(p.primeiro_nome, " ", p.ultimo_nome) as professor'),
                         'dp.dep_nome as departamento',
                         DB::raw('GROUP_CONCAT(ds.disciplina_nome SEPARATOR ", ") as requisito'))
                ->groupBy('d.disciplina_id')
    			->get();

    	return $list;
    }

    public function all_disc()
    {

        $cursos = DB::table('disciplinas') 
                    ->select('disciplina_nome as nome', 'disciplina_id as id')
                    ->get();

        return $cursos;
        
    }
    public function out_disciplina($disc)
    {

        $search = DB::table('disciplinas')->select('departamento')->where('disciplina_id', $disc)->get();
        $departamento = $search[0]->departamento;

        $disciplinas = DB::table('disciplinas') 
                    ->select('disciplina_nome as nome', 'disciplina_id as id')
                    ->where([
                        ['disciplina_id', '<>', $disc],
                        ['departamento', $departamento]
                    ])
                    ->get();

        return $disciplinas;
        
    }
}
