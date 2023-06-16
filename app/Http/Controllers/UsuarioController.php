<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
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
        return view('usuario.usuario');
    }

    public function store(Request $request){
        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->username = $request->input('username');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        //dd($request->input('password'));
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

    public function update(Request $request, $idUsuario){
     
        $usuario = User::findOrFail($idUsuario);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->username = $request->input('username');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->type = $request->input('type');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->save();
        $tipoUsuario = auth()->user()->type;
        return redirect($tipoUsuario.'/usuarios');
    }

    public function delete($idUsuario){
        User::where('id', $idUsuario)->delete();
        return redirect('adm/usuarios');
    }

    /*
    public function storeOrUpdate(Request $request){
        dd('storeOrUpdate');
        $usuario = User::findOrNew(auth()->user()->id); // Encontra o usuário existente ou cria um novo

        $usuario->name = $request->input('name');
        $usuario->username = $request->input('username');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->type = $request->input('nivelPermissao');

        $usuario->save(); // Salva o usuário no banco de dados
        return view('usuario.usuario',  [
            'usuario' => User::findOrFail($request->input('id'))
        ]);
    }*/
}
