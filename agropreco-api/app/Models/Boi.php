<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boi extends Model
{
    use HasFactory;

    protected $table = 'bois';

    protected $fillable = [
        'peso_atual',
        'idade',
        'raca',
        'sexo',
        'data_nascimento',
        'status',
        'codigo_rastreio',
    ];

    protected $casts = [
        'peso_atual' => 'decimal:2',
        'idade' => 'integer',
        'data_nascimento' => 'date',
    ];
}
