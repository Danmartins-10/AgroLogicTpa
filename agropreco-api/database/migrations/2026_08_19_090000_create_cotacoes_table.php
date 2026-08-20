<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cotacoes', function (Blueprint $table) {
            $table->id();
            $table->decimal('preco_arroba', 10, 2);
            $table->string('fonte_cotacao');
            $table->date('data');
            $table->string('regiao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cotacoes');
    }
};
