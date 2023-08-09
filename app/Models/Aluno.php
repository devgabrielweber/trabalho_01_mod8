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
        'telefone'
    ];

    protected $casts = [
        'data_nascimento'=>"date"
    ];
}
