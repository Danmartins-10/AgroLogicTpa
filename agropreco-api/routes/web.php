<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'projeto' => 'AgroPreço',
        'mensagem' => 'API REST funcionando.',
        'api' => '/api'
    ]);
});
