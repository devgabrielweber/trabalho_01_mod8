<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    use HasFactory;
    
    protected $table = 'adicional';
    protected $fillable = [
        'hospede_id',
        'reserva_id',
        'quarto_id',
        'pessoas',
    ];
    protected $casts = [
        'pessoas'=>'integer'
    ];
}
