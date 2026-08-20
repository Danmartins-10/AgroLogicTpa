<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fazenda extends Model
{
    use HasFactory;

    protected $table = 'fazendas';

    protected $fillable = [
        'nome',
        'cidade',
        'estado',
        'localizacao',
        'contato',
    ];
}
