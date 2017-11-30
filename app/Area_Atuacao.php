<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Area_Atuacao extends Model
{

    public $timestamps  = false;
    protected $fillable = [
        'area_nome', 'dep_fk',
    ];

    public function listar_dashboard(){

    	$areas = DB::table('area__atuacaos')
            		->select('area_id as id', 'area_nome as nome')
    				->get();
    	return $areas;
    }
}
