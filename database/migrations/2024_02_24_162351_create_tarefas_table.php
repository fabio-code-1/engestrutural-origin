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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('chefe_id');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->date('prazo');
            $table->enum('prioridade', ['baixa', 'media', 'alta']);
            $table->enum('status', ['executar', 'executando', 'pendente', 'finalizado', 'correcao']);
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('chefe_id')->references('id')->on('chefes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
