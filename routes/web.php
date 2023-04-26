<?php

use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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




Route::get('/adm', [App\Http\Controllers\ChamadoController::class, 'index']);
Route::prefix('adm')->group(function () {
    Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index']);
    Route::post('/usuario', [App\Http\Controllers\UsuarioController::class, 'store']);
    Route::get('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'show']);
    Route::post('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'update']);
    Route::delete('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'delete']);

    Route::get('/chamados', [App\Http\Controllers\ChamadoController::class, 'index']);
    Route::post('/chamado', [App\Http\Controllers\ChamadoController::class, 'store']);
    Route::get('/chamado/{id}', [App\Http\Controllers\RespostaChamado::class, 'show']);
    Route::post('/chamado/{id}', [App\Http\Controllers\RespostaChamado::class, 'store']);
    Route::delete('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'delete']);
});

Route::get('logout', function (){
    auth()->logout();
    Session()->flush();
    return Redirect::to('/entrar');
})->name('logout');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
