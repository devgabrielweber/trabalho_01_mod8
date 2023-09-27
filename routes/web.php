<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\RelacionamentoController;
use App\Http\Controllers\MatriculaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

//chama o método para excluir o registro
Route::get('/aluno/destroy/{id}',
    [AlunoController::class, 'destroy'])->name('aluno.destroy');

//chama o método para serch para pesquisar e filtrar o registro da listagem
Route::post('/aluno/search',
    [AlunoController::class, 'search'])->name('aluno.search');

//relatorio
Route::get('/aluno/report/',
    [AlunoController::class, 'report'])->name('aluno.report');

//grafico
Route::get('/aluno/chart/',
    [AlunoController::class, 'chart'])->name('aluno.chart');



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

Route::get('/relacionamento',
  [RelacionamentoController::class, 'index'])
  ->name('relacionamento');
  Route::post('/matricula/search',
  [MatriculaController::class, 'search'])->name('matricula.search');
Route::resource('matricula', MatriculaController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
