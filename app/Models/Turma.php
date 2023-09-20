<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = "turma";

    protected $fillable = [
        'nome',
        'curso_id',
        'codigo',
        'data_inicio',
        'data_fim',
        'carga_horaria',
    ];

    protected $cast = [
        'curso_id' =>'integer',
        'data_inicio' =>'date',
        'data_fim' =>'date',
        'carga_horaria' =>'integer',
    ];

}
