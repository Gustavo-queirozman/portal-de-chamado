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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'show']);

Route::prefix('adm')->group(function () {
    Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index']); //ok
    Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'show']); //ok
    Route::post('/usuario', [App\Http\Controllers\UsuarioController::class, 'store']); //ok
    Route::get('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'edit']); //ok
    Route::post('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'update']); //ok
    Route::delete('/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'delete']); //ok

    Route::get('/chamados', [App\Http\Controllers\ChamadoController::class, 'index']); //ok
    Route::get('/chamado', [App\Http\Controllers\ChamadoController::class, 'show']); //ok
    Route::post('/chamado', [App\Http\Controllers\ChamadoController::class, 'store']); //OK
    Route::get('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'edit']); //ok
    Route::post('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'update']); //ok
    //Route::delete('/chamado/{id}', [App\Http\Controllers\ChamadoController::class, 'delete']);

    Route::get('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamado::class, 'index']);
    Route::post('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamado::class, 'store']);

  
});

Route::get('logout', function (){
    auth()->logout();
    Session()->flush();
    return Redirect::to('/entrar');
})->name('logout');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
