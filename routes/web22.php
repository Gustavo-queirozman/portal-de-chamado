<?php

use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// Rotas para todos os perfis de usuário
Route::middleware(['auth'])->group(function () {
    // Página inicial
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'show'])->name('home');

    // Rota de logout
    Route::get('logout', function () {
        auth()->logout();
        Session()->flush();
        return Redirect::to('/login');
    })->name('logout');
});



Route::middleware(['auth', 'user-access:adm'])->group(function () {

    Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index']);
    Route::resource('/usuario', [App\Http\Controllers\UsuarioController::class, 'show', 'store']); //ok

        


    Route::get('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'edit']); //ok
    Route::post('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'update']); //ok
    Route::delete('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'delete']); //ok
    Route::post('/pesquisa-usuario', [App\Http\Controllers\PesquisaUsuarioController::class, 'search']); //ok
        
    Route::post('/pesquisa-chamado', [App\Http\Controllers\PesquisaChamadoController::class, 'search']); //ok
    Route::get('/chamados', [App\Http\Controllers\ChamadoController::class, 'index']); //ok
    Route::get('/chamado', [App\Http\Controllers\ChamadoController::class, 'show']); //ok
    Route::post('/chamado', [App\Http\Controllers\ChamadoController::class, 'store']); //OK
    Route::get('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'edit']); //ok
    Route::post('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'update']); //ok
    Route::get('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'index']);
    Route::post('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'store']);

});