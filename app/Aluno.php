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
    	if (isset($values["transf"])) {
           $transf = $values["transf"];
        } else{
            $transf = " ";
        }

        $data = date('Y-m-d');

        $matricula = DB::select('call add_aluno ("'.$values["pnome"].'", "'.$values["unome"].'", "'.$values["email"].'", "'.$values["cpf"].'", "'.$values["rua"].'", "'.$values["bairro"].'", "'.$values["cidade"].'", "'.$values["estado"].'", "'.$values["cep"].'", "'.$values["telefone"].'", "'.$values["curso"].'", "'.$transf.'", "'.$values["admissao"].'", "'.$data.'")');
    }

    public function get_list(){

        $alunos = DB::table('alunos as a')
                    ->join('pessoas as p', 'p.id_pessoa', '=', 'a.fk_pessoa')
                    ->join('matriculas as m', 'm.aluno', '=', 'a.id_aluno')
                    ->join('cursos as c', 'c.curso_id', '=', 'm.curso')
                    ->select('a.id_aluno as id', DB::raw('CONCAT(p.primeiro_nome , " ", p.ultimo_nome) as nome'), 'p.cpf_pessoa as cpf', 'm.matricula_num as matricula', 'c.curso_nome as curso', 'm.data_ingresso as data')
                    ->get();

        return $alunos;

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


