<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes';

    protected $fillable = [
        'tipo_transacao',
        'data',
        'preco_fechado',
    ];

    protected $casts = [
        'data' => 'date',
        'preco_fechado' => 'decimal:2',
    ];
}
