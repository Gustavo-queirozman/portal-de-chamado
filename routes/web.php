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

Route::middleware(['auth', 'user-access:solicitante'])->group(function () {
    Route::prefix('solicitante')->group(function () {
        /*Route::get('', function () {
            return view('solicitante.home');
        });*/   

        Route::get('', [App\Http\Controllers\solicitante\ChamadoController::class, 'show']);

        Route::prefix('chamado')->group(function () {
            Route::get('/ver/{id}', [App\Http\Controllers\DetalhesChamadoController::class, 'show']);
           
            Route::post('/ver', [App\Http\Controllers\DetalhesChamadoController::class, 'store']);

            Route::get('/criar', function () {
                return view('solicitante.chamado.criar');
            });
            
            Route::get('/editar', function () {
                return view('solicitante.chamado.editar');
            });

            /*Route::post('/ver', [App\Http\Controllers\solicitante\ChamadoController::class, 'show']);*/
            Route::get('/criar', [App\Http\Controllers\solicitante\ChamadoController::class, 'create']);
            Route::post('/criar', [App\Http\Controllers\solicitante\ChamadoController::class, 'store']);
            Route::get('/editar', [App\Http\Controllers\solicitante\ChamadoController::class, 'edit']);
            Route::post('/editar', [App\Http\Controllers\solicitante\ChamadoController::class, 'update']);
        });

        Route::prefix('perfil')->group(function () {
            Route::get('/ver', [App\Http\Controllers\solicitante\PerfilController::class, 'show']);
            Route::get('/editar', [App\Http\Controllers\solicitante\PerfilController::class, 'edit']);
            Route::post('/editar', [App\Http\Controllers\solicitante\PerfilController::class, 'update']);
        });
    });
});

Route::middleware(['auth', 'user-access:atendente'])->group(function () {
    Route::prefix('atendente')->group(function () {
        Route::get('', [App\Http\Controllers\atendente\ChamadoController::class, 'show']);

        Route::prefix('chamado')->group(function () {
            Route::get('/ver/{id}', [App\Http\Controllers\DetalhesChamadoController::class, 'show']);
             
            Route::get('/ver', function () {
                return view('atendente.chamado.ver');
            });
            
            Route::get('/criar', function () {
                return view('atendente.chamado.criar');
            });
            Route::get('/editar', function () {
                return view('atendente.chamado.editar');
            });

            Route::post('/criar', [App\Http\Controllers\atendente\ChamadoController::class, 'store']);
        });

        Route::prefix('perfil')->group(function () {
            Route::get('/ver', [App\Http\Controllers\atendente\PerfilController::class, 'show']);
            Route::get('/editar', [App\Http\Controllers\atendente\PerfilController::class, 'edit']);
            Route::post('/editar', [App\Http\Controllers\atendente\PerfilController::class, 'update']);
        });
    });
});

Route::middleware(['auth', 'user-access:administrador'])->group(function () {
    Route::prefix('adm')->group(function () {
        /*Route::get('', function () {
            return view('adm.home');
        });*/

        Route::get('', [App\Http\Controllers\adm\ChamadoController::class, 'show']);


        Route::prefix('chamado')->group(function () {
            Route::get('/ver', [App\Http\Controllers\adm\ChamadoController::class, 'show']);
            Route::get('/ver/{id}', [App\Http\Controllers\DetalhesChamadoController::class, 'show']);

            /*modificar*/
            Route::get('/criar', function () {
                return view('adm.chamado.criar');
            });
            Route::get('/editar', function () {
                return view('adm.chamado.editar');
            });
            Route::get('/excluir', function () {
                return view('adm.chamado.excluir');
            });
            Route::post('/criar', [App\Http\Controllers\adm\ChamadoController::class, 'store']);
            Route::post('/criar', [App\Http\Controllers\adm\ChamadoController::class, 'store']);
        });

        Route::prefix('gestao')->group(function () {
            Route::get('/ver', function () {
                return view('adm.gestao.ver');
            });
        });

        Route::prefix('perfil')->group(function () {
            Route::get('/ver', [App\Http\Controllers\adm\PerfilController::class, 'show']);
            Route::get('/editar', [App\Http\Controllers\adm\PerfilController::class, 'edit']);
            Route::post('/editar', [App\Http\Controllers\adm\PerfilController::class, 'update']);
        });

        Route::prefix('usuario')->group(function () {
            Route::get('', [App\Http\Controllers\adm\UsuarioController::class, 'show']);
            Route::get('/ver', [App\Http\Controllers\adm\UsuarioController::class, 'show']);
            Route::get('/criar', [App\Http\Controllers\adm\UsuarioController::class, 'create']);
            Route::post('/criar', [App\Http\Controllers\adm\UsuarioController::class, 'store']);
            Route::get('/editar/{id}', [App\Http\Controllers\adm\UsuarioController::class, 'edit']);
            Route::post('/editar/{id}', [App\Http\Controllers\adm\UsuarioController::class, 'update']);
            Route::get('/excluir/{id}', [App\Http\Controllers\adm\UsuarioController::class, 'delete']);
        });

        
    });
});


Route::get('logout', function (){
    auth()->logout();
    Session()->flush();
    return Redirect::to('/entrar');
})->name('logout');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
