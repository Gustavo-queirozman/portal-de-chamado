<?php

namespace App\Http\Controllers\autenticacao;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EntrarController extends Controller
{

    public function index(){
        return view('autenticacao.entrar');
    }

    /*
    public function show(){
        $idUsuario = 1;
        $usuario = new User();
        $usuario = $usuario->where('idUsuario', $idUsuario)->get();
        $usuario->fill($usuario);
        return view('solicitante.perfil.editar', ['usuario'=>$usuario]);
    }*/

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
