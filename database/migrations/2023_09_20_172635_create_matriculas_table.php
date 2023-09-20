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
        Schema::create('matricula', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->nullable()
                ->constrained('curso')->default(null);

            $table->foreignId('turma_id')->nullable()
                ->constrained('turma')->default(null);

            $table->foreignId('aluno_id')->nullable()
                ->constrained('aluno')->default(null);

            $table->date('data_matricula');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
