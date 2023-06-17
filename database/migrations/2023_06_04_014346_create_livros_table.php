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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->string('autor', 80);
            $table->integer('ano_publicacao', 11);
            $table->integer('quantidade_paginas', 11);
            $table->string('edicao', 10);
            $table->string('editora', 50);
            $table->integer('ano_edicao', 11);
            $table->float('valor', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
