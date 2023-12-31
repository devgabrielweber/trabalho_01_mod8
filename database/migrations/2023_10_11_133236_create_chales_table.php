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
        Schema::create('chale', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('pessoas');
            $table->string('descricao')->nullable();
            $table->string('foto')->nullable();
            $table->float('diaria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chale');
    }
};
