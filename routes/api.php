<?php

use Illuminate\Support\Facades\Route;

// Rotas de API (stateless). Se não for usar, pode ficar vazio com a rota abaixo só para teste.
Route::get('/ping', function () {
    return ['ok' => true, 'time' => now()->toDateTimeString()];
});
