<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();

            //CHAVES ESTRANGEIRAS DE HOSPEDE E QUARTO
            $table->foreignId('hospede_id')->nullable()->constrained('hospede')->default(null);
            $table->foreignId('quarto_id')->nullable()->constrained('quarto')->default(null);

            $table->date('data_inicio');
            $table->date('data_fim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
