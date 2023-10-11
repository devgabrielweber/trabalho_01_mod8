<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    use HasFactory;

    protected $table = "quarto";

    //protected $guarded =["id"];

    protected $fillable = [
        'numero',
        'qtd_camas',
        'descricao',
        'diaria',
        'foto',
    ];

    protected $cast = [
        'numero'=>'integer',
        'qtd_camas'=>'integer',
        'diaria'=>'float'
    ];

}
