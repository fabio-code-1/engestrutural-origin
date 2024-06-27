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
        Schema::create('financeiros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('projeto_id');
            $table->string('categoria_pagamento')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('pagamento')->nullable();
            $table->integer('parcela')->nullable();
            $table->date('data_pagamento')->nullable(); 
        
            // Define as chaves estrangeiras
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('projeto_id')->references('id')->on('projetos');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiros');
    }
};
