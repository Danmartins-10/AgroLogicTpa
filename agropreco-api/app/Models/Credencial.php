<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    use HasFactory;

    protected $table = 'credenciais';

    protected $fillable = [
        'tipo',
        'data_emissao',
        'validade',
        'descricao',
    ];

    protected $casts = [
        'data_emissao' => 'date',
        'validade' => 'date',
    ];
}
