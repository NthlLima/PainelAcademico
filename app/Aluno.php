<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Aluno extends Model
{
    protected $fillable = [
        'id_aluno','fk_pessoa',
    ];

    public function matricular($values)
    {
    	# code...
    }

    public function transferir($values)
    {
    	# code...
    }

    public function all_alunos()
    {

        $alunos = DB::table('alunos as a') 
                    ->join('pessoas as p', 'p.id_pessoa', '=', 'a.fk_pessoa')
                    ->select('a.id_aluno as id', DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as nome') , 'p.cpf_pessoa as cpf')
                    ->get();

        return $alunos;
        
    }
    
}
