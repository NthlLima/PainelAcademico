<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Curso extends Model
{
    public $timestamps  = false;
    protected $fillable = [
        'curso_nome', 'area_fk', 'coordenador', 'num_horas', 'num_creditos',
    ];

    public function listar()
    {

        $cursos = DB::table('cursos as c') 
                    ->join('professors as pf','pf.id_professor','=','c.coordenador')
                    ->join('pessoas as p','p.id_pessoa','=','pf.fk_pessoa')
                    ->join('area__atuacaos as a','a.area_id','=','c.area_fk')
                    ->join('departamentos as d','d.dep_id','=','a.dep_fk')
                    ->select('c.curso_nome as nome', 'c.num_horas as horas', 'c.num_creditos as creditos', DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as coord'), 'a.area_nome as area', 'd.dep_nome as dep')
                    ->get();

        return $cursos;
        
    }

    public function by_departamento($value)
    {

    	$cursos = DB::table('cursos as c') 
                    ->join('area__atuacaos as a','a.area_id','=','c.area_fk')
                    ->join('departamentos as d','d.dep_id','=','a.dep_fk')
            		->select('c.curso_id as curso_id', 'c.curso_nome as curso_nome', 'c.area_fk as area_fk', 'c.coordenador as coordenador', 'c.num_horas as num_horas', 'c.num_creditos as num_creditos')
                    ->where('d.dep_id', $value)
    				->get();

    	return $cursos;
    	
    }
}
