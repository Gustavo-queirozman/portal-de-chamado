<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct(){

    }

    public function show()
    {
        $usuarios = DB::table('users')->select('id', 'name', 'email', 'username')->get();
        return view('adm.usuario.ver',  [
            'usuarios' => $usuarios
        ]); 
    }
    
    public function create(){
        return view('adm.usuario.criar');
    }

    public function store(Request $request)
    {       
        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->username = $request->input('username');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->type = $request->input('nivelPermissao');
        $usuario->save();

        $usuarios = User::all();
        return view('adm/usuario/ver', [
            'usuarios' => $usuarios
        ]);
    }


    public function edit($idUsuario){

        return view('adm.chamado.ver', [
            'chamado' => User::findOrFail($idUsuario)
        ]);
    }

    public function update(Request $request)
    {
        $idChamado = 1;
        $chamado = User::findOrFail($idChamado);
        $chamado->tipo = $request->input('tipo');
        $chamado->update();
        return view('adm.chamado.editar',  [
            'chamado' => User::findOrFail($idChamado)
        ] );
    }

    public function delete($id){
    
        User::where('id', $id)->delete();
        return redirect('adm/usuario');
    }
}
