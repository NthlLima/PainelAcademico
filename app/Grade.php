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
}
