<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lazer extends Model
{
    use HasFactory;

    protected $table = 'lazer';
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
