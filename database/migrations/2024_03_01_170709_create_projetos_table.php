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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('valor_arquitetonico')->nullable();
            $table->string('valor_estrutural')->nullable();
            $table->string('valor_hidraulica')->nullable();
            $table->string('valor_eletrica')->nullable();
            $table->boolean('status')->default(0); 
            $table->unsignedBigInteger('id_cliente'); 
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
