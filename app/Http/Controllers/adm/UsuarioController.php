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
        return view('adm.usuario.editar', [
            'usuario' => User::findOrFail($idUsuario)
        ]);
    }

    public function update(Request $request)
    {
        $usuario = User::findOrFail($request->input('id'));
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->username = $request->input('username');
        $usuario->type = $request->input('type');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->save();
        
        return view('adm.usuario.editar',  [
            'usuario' => User::findOrFail($request->input('id'))
        ]);
    }

    public function delete($id){
        User::where('id', $id)->delete();
        return redirect('adm/usuario');
    }
}
