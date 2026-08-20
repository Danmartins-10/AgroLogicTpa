<?php

use App\Http\Controllers\BoiController;
use App\Http\Controllers\ContratoFuturoController;
use App\Http\Controllers\CotacaoController;
use App\Http\Controllers\CredencialController;
use App\Http\Controllers\FazendaController;
use App\Http\Controllers\HistoricoPesoController;
use App\Http\Controllers\ProjecaoController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'usuarios' => UsuarioController::class,
    'transacoes' => TransacaoController::class,
    'contratos-futuros' => ContratoFuturoController::class,
    'bois' => BoiController::class,
    'fazendas' => FazendaController::class,
    'historico-pesos' => HistoricoPesoController::class,
    'credenciais' => CredencialController::class,
    'projecoes' => ProjecaoController::class,
    'cotacoes' => CotacaoController::class,
]);
