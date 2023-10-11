<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espaco extends Model
{
    use HasFactory;

    protected $table = 'espaco';
    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'foto'
    ];

    protected $casts = [ 
        'valor'=>'float',
    ];
}
