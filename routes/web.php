<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlunoController;

//chamar uma função do controlador
Route::get('/usuario', [UsuarioController::class, 'index']);

//carrega uma listagem do banco
Route::get('/aluno',
    [AlunoController::class, 'index'])->name('aluno.index');

//chama o formulário do aluno
Route::get('/aluno/create',
    [AlunoController::class, 'create'])->name('aluno.create');

 //realiza a ação de salvar do formulário
 Route::post('/aluno',
    [AlunoController::class, 'store'])->name('aluno.store');

//chama o formulário para edição
Route::get('/aluno/edit/{id}',
    [AlunoController::class, 'edit'])->name('aluno.edit');

 //realiza a ação de atualizar os dados do formulário
 Route::put('/aluno/update/{id}',
    [AlunoController::class, 'update'])->name('aluno.update');

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
