<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chale extends Model
{
    use HasFactory;
    protected $table = "chale";

    protected $fillable = [
        'numero',
        'pessoas',
        'descricao',
        'foto',
        'diaria',
    ];

    protected $casts = [
        'numero'=>'integer',
        'pessoas'=>'integer',
        'diaria'=>'float',
    ];
}
