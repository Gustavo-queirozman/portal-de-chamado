<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $usuarios = DB::table('users')->select('id', 'name', 'email', 'username')->get();
        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function show()
    {
        return view('usuario.usuario', [
            'usuario' => null
        ]);
    }

    public function create()
    {
        return view('usuario.usuario');
    }

    public function store(Request $request)
    {
        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->username = $request->input('username');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->type = $request->input('type');
        $existingUser = User::where('email', $usuario->email)->first();
        if ($existingUser) {
            return redirect()->back()->with('usuario.usuario', 'Este e-mail já está cadastrado.');
        }

        $usuario->save();

        $usuarios = User::all();
        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function edit($idUsuario)
    {
        $tipoUsuario = auth()->user()->type;
        if (auth()->user()->type == "atendente" or  auth()->user()->type == "solicitante") {
            if (auth()->user()->id != $idUsuario) {
                if ($tipoUsuario != 'adm') {
                    return redirect($tipoUsuario . '/usuario' . '/' . auth()->user()->id);
                }
                return redirect()->route($tipoUsuario . '/usuarios');
            }
        }
        return view('usuario.usuario', [
            'usuario' => User::findOrFail($idUsuario)
        ]);
    }

    public function update(Request $request, $idUsuario)
    {
        $tipoUsuario = auth()->user()->type;
        if (auth()->user()->type == "atendente" or  auth()->user()->type == "solicitante") {
            if (auth()->user()->id != $idUsuario) {
                return redirect($tipoUsuario . '/usuario' . '/' . auth()->user()->id);
            }
        }


        if (auth()->user()->type == "atendente") {
            $tipoUsuario = 'atendente';
        }

        if (auth()->user()->type == "solicitante") {
            $tipoUsuario = 'solicitante';
        }

        if (auth()->user()->type == 'adm') {
            $tipoUsuario = $request->input('type');
        }


        $usuario = User::findOrFail($idUsuario);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->username = $request->input('username');
        if($request->input('password')) {
            $usuario->password = Hash::make($request->input('password'));
        }
        $usuario->type =  $tipoUsuario;
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->save();

        if ($tipoUsuario != 'adm') {
            return redirect($tipoUsuario . '/usuario' . '/' . auth()->user()->id);
        }
        return redirect($tipoUsuario . '/usuarios');
    }

    public function delete($idUsuario)
    {
        User::where('id', $idUsuario)->delete();
        return redirect('adm/usuarios');
    }
}
