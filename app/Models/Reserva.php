<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = "reserva";

    protected $fillable = [
        'hospede_id',
        'quarto_id',
        'data_inicio',
        'data_fim',
    ];

    protected $casts = [
        'data_inicio'=>"date",
        'data_fim'=>"date",
        'hospede_id'=> "integer",
        'quarto_id'=> "integer"
    ];

    //RELACIONAMENTOS: AMBOS 1:1
    //UMA RESERVA TERÁ UM HÓSPEDE E UM QUARTO


    public function hospede(){
        return $this->belongsTo(Hospede::class);
    }

    public function quarto(){
        return $this->belongsTo(Quarto::class);
    }
}
