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




/*
Route::get('/', function () {
    return view('autenticacao.entrar');
});

Route::get('/entrar', function () {
    return view('autenticacao.entrar');
});

Route::post('/entrar', [App\Http\Controllers\autenticacao\EntrarController::class, 'entrar'])->name('entrar');



Route::get('/cadastro', function () {
    return view('autenticacao.index');
});
Route::post('/cadastro', [App\Http\Controllers\autenticacao\CadastroController::class, 'solicitarCadastro'])->name('solicitarCadastro');

Route::get('/solicitarCadastro', function () {
    return view('autenticacao.solicitarCadastro');
});
Route::post('/solicitarCadastro', [App\Http\Controllers\autenticacao\CadastroController::class, 'solicitarCadastro'])->name('solicitarCadastro');

Route::get('/cadastro', function () {
    return view('autenticacao.cadastro');
});
Route::post('/cadastro', [App\Http\Controllers\autenticacao\CadastroController::class, 'cadastro'])->name('cadastro');

Route::get('/mudarSenha', function () {
    return view('autenticacao.mudarSenha');
});
Route::post('/mudarSenha', [App\Http\Controllers\autenticacao\MudarSenhaController::class, 'mudarSenha'])->name('mudarSenha');

Route::get('/esqueciSenha', function () {
    return view('autenticacao.esqueciSenha');
});
Route::post('/esqueciSenha', [App\Http\Controllers\autenticacao\EsqueciSenhaController::class, 'enviarNovaSenhaNoEmail'])->name('esqueciSenha');


Route::get('/login', function () {
    return view('autenticacao.entrar');
});

Route::get('/entrar', [App\Http\Controllers\Auth\LoginController::class, 'show']);
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

    Route::get('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'index']);
    Route::post('/resposta-chamado/{id}', [App\Http\Controllers\RespostaChamadoController::class, 'store']);
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'show']);
});

Route::get('logout', function (){
    auth()->logout();
    Session()->flush();
    return Redirect::to('/entrar');
})->name('logout');

Auth::routes();
