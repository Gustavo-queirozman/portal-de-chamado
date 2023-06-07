<?php

namespace App\Http\Controllers\autenticacao;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EntrarController extends Controller
{

    public function index(){
        return view('auth.login');
    }

    public function entrar(Request $request)
    {

        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        $user = new User();
        $dados = $user->where('usuario', $usuario)->where('senha', $senha)->get()->first();

        if (isset($dados)) {
            return view('autenticacao.index');
        } else {
            return redirect()->route('entrar');
        }
    }
}
