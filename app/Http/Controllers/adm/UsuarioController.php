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
    
    public function create()
    {
     
        return view('adm.usuario.criar');
    }

    public function store(Request $request)
    {       
        User::create([
            'tipo' => $request->input('tipo'),
            'categoria' => $request->input('categoria'),
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao')
        ]);

        return view('adm.home');
    }


    public function edit($idUsuario){
        dd('dsdf');
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
}
