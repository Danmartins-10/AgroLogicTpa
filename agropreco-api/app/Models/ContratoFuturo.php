<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoFuturo extends Model
{
    use HasFactory;

    protected $table = 'contratos_futuros';

    protected $fillable = [
        'data_acordo',
        'data_entrega',
        'preco_acordado',
        'observacoes',
    ];

    protected $casts = [
        'data_acordo' => 'date',
        'data_entrega' => 'date',
        'preco_acordado' => 'decimal:2',
    ];
}
