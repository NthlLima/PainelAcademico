<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Grade extends Model
{
	public $timestamps  = false;
    protected $fillable = [
        'disciplina', 'curso', 'periodo',
    ];

    public function buscar($item)
    {
    	$busca = DB::table('grades as g')
    				->join('disciplinas as d', 'd.disciplina_id', '=', 'g.disciplina')
    				->select('g.periodo as periodo', 'd.disciplina_nome as disciplina', 'd.num_horas as horas', 'd.num_creditos as creditos')
    				->where('g.curso', $item)
    				->orderBy('g.periodo', 'asc')
    				->get();

    	return $busca;
    }



    // public function listar(){
    // 	$list = DB::table('disciplinas as d')
    //             ->join('professors as pf', 'pf.id_professor', '=', 'd.professor')
    //             ->join('pessoas as p', 'p.id_pessoa', '=', 'pf.fk_pessoa')
    //             ->join('departamentos as dp', 'dp.dep_id', '=', 'd.departamento')
    //             ->leftJoin('pre__requisitos as pr', 'pr.disciplina', '=', 'd.disciplina_id')
    //             ->leftJoin('disciplinas as ds', 'ds.disciplina_id', '=', 'pr.pre_requisito')
    // 			->select('d.disciplina_id as id', 
    //                      'd.disciplina_nome as nome',
    //                      'd.num_horas as horas',
    //                      'd.num_creditos as creditos',
    //                      DB::raw('CONCAT(p.primeiro_nome, " ", p.ultimo_nome) as professor'),
    //                      'dp.dep_nome as departamento',
    //                      DB::raw('GROUP_CONCAT(ds.disciplina_nome SEPARATOR ", ") as requisito'))
    //             ->groupBy('d.disciplina_id')
    // 			->get();

    // 	return $list;
    // }
}
