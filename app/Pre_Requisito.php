<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pre_Requisito extends Model
{
    public $timestamps  = false;
    protected $fillable = [
        'disciplina', 'pre_requisito',
    ];
}
