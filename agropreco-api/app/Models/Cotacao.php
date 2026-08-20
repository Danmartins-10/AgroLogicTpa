<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    use HasFactory;

    protected $table = 'cotacoes';

    protected $fillable = [
        'preco_arroba',
        'fonte_cotacao',
        'data',
        'regiao',
    ];

    protected $casts = [
        'preco_arroba' => 'decimal:2',
        'data' => 'date',
    ];
}
