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
        Schema::disableForeignKeyConstraints();
        Schema::create('adicional', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospede_id')->constrained('hospede');
            $table->foreignId('espaco_id')->constrained('espaco');
            $table->foreignId('reserva_id')->constrained('reserva');
            $table->integer('pessoas');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adicional');
    }
};
