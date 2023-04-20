<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\adm\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show()
    {
        //session_start();
        $idUsuario = 1;
        return view('adm.perfil.editar', [
            'usuario' => Perfil::findOrFail($idUsuario)
        ]);
    }

    public function edit(Request $request)
    {
        $idUsuario = 1;
        return view('adm.perfil.editar', [
            'usuario' => Perfil::findOrFail($idUsuario)
        ]);
    }

    public function update(Request $request)
    {
        $idUsuario = 1;
        $usuario = Perfil::findOrFail($idUsuario);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->username = $request->input('username');
        $usuario->password = $request->input('password');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');

        $usuario->update();
        return view('adm.perfil.editar',  [
            'usuario' => Perfil::findOrFail($idUsuario)
        ] );
    }

    
}
