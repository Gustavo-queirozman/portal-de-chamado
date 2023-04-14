<?php

namespace App\Http\Controllers\solicitante;

use App\Http\Controllers\Controller;

use App\Models\solicitante\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamadoController extends Controller
{
    public function __construct()
    {
        
    }

    public function show()
    {
 
        $idUsuario = 1;
        $chamado = new Chamado();
        $chamados = $chamado->where('fkUsuario', $idUsuario)->get();
        //$dados->fill($dados);
        return view('solicitante.home',  [
            'chamados' => $chamados
        ]); 

    }
    
    public function create()
    {
        return view('solicitante.chamado.criar');
    }

    public function store(Request $request)
    {       
        Chamado::create([
            'tipo' => $request->input('tipo'),
            'categoria' => $request->input('categoria'),
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao')
        ]);

        return view('solicitante.home');
    }


    public function edit($idChamado)
    {
        return view('solicitante.chamado.ver', [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function update(Request $request)
    {
        $idChamado = 1;
        $chamado = Chamado::findOrFail($idChamado);
        $chamado->tipo = $request->input('tipo');
        $chamado->update();
        return view('solicitante.chamado.editar',  [
            'chamado' => Chamado::findOrFail($idChamado)
        ] );
    }

    /*
    public function getChamado()
    {
        session_start();
        $idUsuario = 1;
        $user = new User();
        $dados = $user->where('idUsuario', $idUsuario)->get();
        $nome = $dados[0]['nomeCompleto'];
        $email = $dados[0]['email'];
        $usuario = $dados[0]['usuario'];
        $senha = $dados[0]['senha'];
        $setor = $dados[0]['setor'];
        $ramal = $dados[0]['ramal'];
        $codAnydesk = $dados[0]['codAnydesk'];
        return view('solicitante.perfil.editar', ['nome' => $nome, 'email' => $email, 'usuario' => $usuario, 'senha' => $senha, 'setor' => $setor, 'ramal' => $ramal, 'codAnydesk' => $codAnydesk]);
    }

    public function postChamado(Request $request)
    {
        print_r($request);
        return view('solicitante.perfil.editar', compact($request));
    }


    public function create(Request $request)
    {
        Chamado::create($request->all());

        return redirect()->route('solicitante.chamado.index')
            ->with('success', 'Product created successfully.');
    }*/
}
