<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlunoController;

//chamar uma função do controlador
Route::get('/usuario', [UsuarioController::class, 'index']);

//rota aluno
Route::get('/aluno',
 [AlunoController::class, 'index'])->name('aluno.index');

Route::get('/aluno/create',
 [AlunoController::class, 'create'])->name('aluno.create');

 Route::post('/aluno',
[AlunoController::class, 'store'])->name('aluno.store');


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
