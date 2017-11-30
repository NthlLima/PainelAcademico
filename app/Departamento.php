<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Departamento extends Model
{
    public $timestamps  = false;
    protected $fillable = [
        'dep_nome',
    ];

    public function listar_dashboard(){

    	$deps = DB::table('departamentos as d') 
                    ->leftJoin('area__atuacaos as a','a.dep_fk','=','d.dep_id')
            		->select('d.dep_id as id', 'd.dep_nome as nome' , 'a.area_nome as area')
    				->get();
    	return $deps;
    }

    public function sem_area_atuacao(){

        $deps = DB::table('departamentos as d') 
                    ->leftJoin('area__atuacaos as a','a.dep_fk','=','d.dep_id')
                    ->select('d.dep_id as id', 'd.dep_nome as nome')
                    ->where('a.dep_fk', NULL)
                    ->get();
        return $deps;
    }
}
