<?php

namespace App\Http\Controllers\atendente;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User;
use App\Models\atendente\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
   
    public function __construct()
    {

    }

    public function show()
    {
        //session_start();
        $idUsuario = 1;

        return view('atendente.perfil.editar', [
            'usuario' => Perfil::findOrFail($idUsuario)
        ]);
    }

    public function edit(Request $request)
    {
        $idUsuario = 1;
        return view('atendente.perfil.editar', [
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
        $usuario->password = Hash::make($request->input('password'));;
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');

        $usuario->update();
        return view('atendente.perfil.editar',  [
            'usuario' => Perfil::findOrFail($idUsuario)
        ] );
    }


}
