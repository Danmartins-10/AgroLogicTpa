<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecao extends Model
{
    use HasFactory;

    protected $table = 'projecoes';

    protected $fillable = [
        'preco_esperado',
        'metodo_calculo',
        'data_previsao',
    ];

    protected $casts = [
        'preco_esperado' => 'decimal:2',
        'data_previsao' => 'date',
    ];
}
