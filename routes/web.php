<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;

//chamar uma função do controlador
Route::get('/usuario', [UsuarioController::class, 'index']);

//chamar uma página em HTML
Route::get('/pagina', function () {
    return view('index');
});

//chama um HTML
Route::get('/teste', function () {
    return "<h4>Olá Mundo Laravel!</h4>";
});


Route::get('/', function () {
    return view('welcome');
});
