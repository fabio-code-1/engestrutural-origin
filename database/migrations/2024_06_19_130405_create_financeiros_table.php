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
            $table->string('cliente');
            $table->string('projeto');
            $table->string('categoria_pagamento')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('pagamento')->nullable();
            $table->integer('parcela')->nullable();
            $table->date('data_pagamento')->nullable();    
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
