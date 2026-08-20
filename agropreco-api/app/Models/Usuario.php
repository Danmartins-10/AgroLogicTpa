<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'tipo_usuario',
        'data_cadastro',
    ];

    protected $casts = [
        'data_cadastro' => 'date',
    ];

    protected $hidden = ['senha'];
}
