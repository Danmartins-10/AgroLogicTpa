<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projecoes', function (Blueprint $table) {
            $table->id();
            $table->decimal('preco_esperado', 10, 2);
            $table->string('metodo_calculo');
            $table->date('data_previsao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projecoes');
    }
};
