<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct(){  
        
    }

    public function index(){
        $usuarios = DB::table('users')->select('id', 'name', 'email', 'username')->get();
        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function show(){
        return view('usuario.usuario', [
            'usuario' => null
        ]);
    }
    
    public function create(){
        return view('adm.usuario.criar');
    }

    public function store(Request $request)
    {       
        dd('rota store');
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
        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
    }


    public function edit($idUsuario){
        return view('usuario.usuario', [
            'usuario' => User::findOrFail($idUsuario)
        ]);
    }

    public function update(Request $request)
    {
        $usuario = User::findOrFail($request->input('id'));
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->username = $request->input('username');
        $usuario->password = $request->input('password');
        $usuario->type = $request->input('type');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->save();
        
        return view('usuario.usuario',  [
            'usuario' => User::findOrFail($request->input('id'))
        ]);
    }

    public function delete($idUsuario){
        User::where('id', $idUsuario)->delete();
        return redirect('adm/usuarios');
    }

    public function search(Request $request){
        dd($request);
        $usuario ='';
        $nome = '';
        $email = '';
        $dataInicial = '';
        $dataFinal = '';
    }
}
