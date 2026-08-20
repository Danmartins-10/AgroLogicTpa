<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratos_futuros', function (Blueprint $table) {
            $table->id();
            $table->date('data_acordo');
            $table->date('data_entrega');
            $table->decimal('preco_acordado', 10, 2);
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratos_futuros');
    }
};
