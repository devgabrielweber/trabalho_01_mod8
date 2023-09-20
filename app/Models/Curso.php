<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = "curso";

    //protected $guarded =["id"];

    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor'
    ];

    protected $cast = [
        'carga_horaria'=>'integer',
        'valor'=>'float'
    ];

}
