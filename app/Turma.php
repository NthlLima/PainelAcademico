<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Turma extends Model
{

    public $timestamps  = false;
    protected $fillable = [
        'turma_num', 'turma_disciplina',
    ];



    public function adicionar($values)
    {

    	DB::select('call add_turma ("'.$values["turma_num"].'",
    											 "'.$values["turma_disciplina"].'", 
    											 "'.$values["horario"][0].'", 
    											 "'.$values["horario"][1].'", 
    											 "'.$values["dia"][0].'", 
    											 "'.$values["dia"][1].'" 
    											 )');
    }

}
