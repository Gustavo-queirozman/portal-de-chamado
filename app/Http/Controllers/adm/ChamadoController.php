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
        return view('adm.home',  [
            'chamados' => $chamados
        ]);
    }

    public function create()
    {
        return view('adm.chamado.criar');
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

        return view('adm.home');
    }


    public function edit($idChamado)
    {
        return view('adm.chamado.ver', [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function update(Request $request)
    {
        $idChamado = 1;
        $chamado = Chamado::findOrFail($idChamado);
        $chamado->tipo = $request->input('tipo');
        $chamado->update();
        return view('adm.chamado.editar',  [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function search(Request $request)
    {

        dd($request);
        $tipo = 'codChamado'; //hardware ou software
        $dataInicial = null;
        $dataFinal = null;

        if ($tipo == null) {
            dd('campo obrigatório');
        }

        if ($tipo = 'codChamado' && $dataInicial != null && $dataFinal != null) {

        }

        if ($tipo = 'Hardware' && $dataInicial != null && $dataFinal != null) {

        }

        if ($tipo = 'Software' && $dataInicial != null && $dataFinal != null) {

        }

        if ($tipo = 'Hardware') {

        }

        if ($tipo = 'Software') {
            
        }

    }
}
