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
        Schema::create('devolucoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emprestimo_id');
            $table->decimal('multa')->nullable();
            $table->timestamps();

            $table->foreign('emprestimo_id')->references('id')->on('emprestimos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devolucoes');
    }
};
