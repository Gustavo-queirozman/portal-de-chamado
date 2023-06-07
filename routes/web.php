<?php

use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'user-access:adm'])->group(function () {
    Route::get('/adm', [App\Http\Controllers\ChamadoController::class, 'index']);
    Route::prefix('adm')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'show']);
        Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index']); //ok
        Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'show']); //ok
        Route::post('/usuario', [App\Http\Controllers\UsuarioController::class, 'store']); //ok
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
});

Route::middleware(['auth', 'user-access:solicitante'])->group(function () {
    Route::get('/solicitante', [App\Http\Controllers\ChamadoController::class, 'index']);
    Route::prefix('solicitante')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'show']);
        Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'show']); //ok
        Route::get('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'edit']); //ok
        Route::post('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'update']); //ok

        Route::get('/chamados', [App\Http\Controllers\ChamadoController::class, 'index']); //ok
        Route::get('/chamado', [App\Http\Controllers\ChamadoController::class, 'show']); //ok
        Route::post('/chamado', [App\Http\Controllers\ChamadoController::class, 'store']); //OK
        Route::get('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'edit']); //ok
        Route::post('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'update']); //ok
        Route::get('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'index']);
        Route::post('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'store']);
    });
});

Route::middleware(['auth', 'user-access:atendente'])->group(function () {
    Route::get('/atendente', [App\Http\Controllers\ChamadoController::class, 'index']);
    Route::prefix('atendente')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'show']);
        Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'show']); //ok
        Route::get('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'edit']); //ok
        Route::post('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'update']); //ok

        Route::get('/chamados', [App\Http\Controllers\ChamadoController::class, 'index']); //ok
        Route::get('/chamado', [App\Http\Controllers\ChamadoController::class, 'show']); //ok
        Route::post('/chamado', [App\Http\Controllers\ChamadoController::class, 'store']); //OK
        Route::get('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'edit']); //ok
        Route::post('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'update']); //ok
        Route::get('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'index']);
        Route::post('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'store']);
    });
});

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/login');
})->name('logout');

Auth::routes();

Route::get('/register', function () {
    return view('autenticacao.solicitarCadastro');
});

Route::post('/register', [App\Http\Controllers\Auth\CadastroController::class, 'solicitarCadastro'])->name('solicitarCadastro');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
