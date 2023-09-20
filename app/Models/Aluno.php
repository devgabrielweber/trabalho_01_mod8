<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = "aluno";

    protected $fillable = ['nome',
        'data_nascimento',
        'cpf',
        'email',
        'telefone',
        'categoria_aluno_id',
        'imagem',
    ];

    protected $casts = [
        'data_nascimento'=>"date",
        'categoria_aluno_id'=> "integer"
    ];

    public function matricula(){
        //relacionamento 1 - 1 (um para um)
        return $this->hasOne(Matricula::class);
    }

    public function categoria(){
        return $this->belongsTo(CategoriaAluno::class,
            'categoria_aluno_id','id');
    }
}
