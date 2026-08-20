<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoPeso extends Model
{
    use HasFactory;

    protected $table = 'historico_pesos';

    protected $fillable = [
        'data',
        'peso',
    ];

    protected $casts = [
        'data' => 'date',
        'peso' => 'decimal:2',
    ];
}
