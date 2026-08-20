<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bois', function (Blueprint $table) {
            $table->id();
            $table->decimal('peso_atual', 8, 2);
            $table->unsignedInteger('idade');
            $table->string('raca');
            $table->string('sexo');
            $table->date('data_nascimento');
            $table->string('status');
            $table->string('codigo_rastreio')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bois');
    }
};
