<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\adm\Chamado;
use Illuminate\Http\Request;

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
}
