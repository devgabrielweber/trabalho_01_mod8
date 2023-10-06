<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\HospedeController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;

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


  Route::view('/', 'main');


  //ROTAS DOS HÓSPEDES

    Route::resource('hospede', HospedeController::class);

    Route::post('/hospede',[HospedeController::class, 'index'])->name('hospede.list');
  
    Route::post('/hospede/search',[HospedeController::class, 'search'])->name('hospede.search');
  
    Route::post('/hospede',[HospedeController::class, 'store'])->name('hospede.store');
  
    Route::get('/hospede/destroy/{id}',[HospedeController::class, 'destroy'])->name('hospede.destroy');
  
    Route::put('/hospede/update/{id}',[HospedeController::class, 'update'])->name('hospede.update');



  //ROTAS DOS QUARTOS
    Route::resource('quarto', QuartoController::class);

    Route::post('/quarto',[QuartoController::class, 'index'])->name('quarto.list');
  
    Route::post('/quarto/search',[QuartoController::class, 'search'])->name('quarto.search');
  
    Route::post('/quarto',[QuartoController::class, 'store'])->name('quarto.store');
  
    Route::get('/quarto/destroy/{id}',[QuartoController::class, 'destroy'])->name('quarto.destroy');
  
    Route::put('/quarto/update/{id}',[QuartoController::class, 'update'])->name('quarto.update');



  //ROTAS DAS RESERVAS

    Route::resource('reserva', ReservaController::class);
    
    Route::post('/reserva',[ReservaController::class, 'index'])->name('reserva.list');
  
    Route::post('/reserva/search',[ReservaController::class, 'search'])->name('reserva.search');
  
    Route::post('/reserva',[ReservaController::class, 'store'])->name('reserva.store');
  
    Route::get('/reserva/destroy/{id}',[ReservaController::class, 'destroy'])->name('reserva.destroy');
  
    Route::get('/reserva/edit/{id}',[ReservaController::class, 'edit'])->name('reserva.edit');

    Route::put('/reserva/update/{id}',[ReservaController::class, 'update'])->name('reserva.update');






    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
