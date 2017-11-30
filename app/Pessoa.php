<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Pessoa extends Model
{
    protected $fillable = [
        'id_pessoa','primeiro_nome', 'ultimo_nome', 'email_pessoa', 'cpf_pessoa',
    ];

    public function nao_professor(){

        $pessoas = DB::table('pessoas as p')
                    ->leftJoin('professors as pf','pf.fk_pessoa','=','p.id_pessoa')
                    ->select(DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as nome') , 'p.cpf_pessoa as CPF', 'p.id_pessoa as id')
                    ->where('pf.id_professor', NULL)
                    ->get();
        return $pessoas; 
    }
}
