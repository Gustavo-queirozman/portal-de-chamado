<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamadoController extends Controller
{

    public function index(Request $request)
    {
        $idUsuario = auth()->user()->id;
        $codigoChamado = $request->input('codigoChamado');
        $tipoPesquisa = $request->input('codigoChamado');
        $dataInicial = $request->input('dataInicial');
        $dataFinal = $request->input('dataFinical');

        //1- Pesquisar chamados entre intervalo de datas
        if ($tipoPesquisa == 'Hardware' && !empty($dataInicial)) {
            $chamado = DB::table('chamado')->where('tipo', '=', 'Hardware')->get();
            dd('ssfdfsd');
        }

        if ($tipoPesquisa == 'Software' && !empty($dataInicial)) {
            $chamado = DB::table('chamado')->where('tipo', '=', 'Software')->get();
        }

        //2- Pesquisar chamados pelo tipo de chamado == hardware
        if ($tipoPesquisa == 'Hardware' && empty($dataInicial)) {
            $chamados = DB::table('chamado')->where('tipo', '=', 'Hardware')->get();
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //3- Pesquisar chamados pelo tipo de chamado == software
        if ($tipoPesquisa == 'Software' && empty($dataInicial)) {
            $chamados = DB::table('chamado')->where('tipo', '=', 'Software')->get();
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //4- Pesquisar chamados pelo numero do chamado
        if ($tipoPesquisa == 'codigoChamado' && empty($dataInicial)) {
            $chamado = DB::table('chamado')->where('id', '=', $codigoChamado)->get();
        }

        //5- Pesquisar chamados pelo tipo de chamado == hardware e data
        if ($tipoPesquisa == 'Hardware' && !empty($dataInicial) && !empty($dataFinal)) {
            $chamados = DB::table('chamado')
                ->where('tipo', '=', 'Hardware')
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //6- Pesquisar chamados pelo tipo de chamado == software e data
        if ($tipoPesquisa == 'Software' && !empty($dataInicial) && !empty($dataFinal)) {
            $chamados = DB::table('chamado')
                ->where('tipo', '=', 'Software')
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //montar pesquisa pegando todos os dados, nesse ceario os dados vem sem filtro
        $chamado = new Chamado();
        $chamados = $chamado->where('fkUsuario', $idUsuario)->get();
        return view('chamado.index',  [
            'chamados' => $chamados
        ]);
    }

    public function show()
    {
        //$idUsuario = 1;
        //$chamado = new Chamado();
        //$chamados = $chamado->where('fkUsuario', $idUsuario)->get();
        return view('chamado.chamado',  [
            'chamado' =>  null
        ]);
    }

    public function create()
    {
        return view('atendente.chamado.criar');
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

        return view('atendente.home');
    }


    public function edit($idChamado)
    {
        return view('chamado.chamado', [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function update(Request $request, $idChamado)
    {
        $chamado = Chamado::findOrFail($idChamado);
        $chamado->tipo = $request->input('tipo');
        $chamado->categoria = $request->input('categoria');
        $chamado->prioridade = $request->input('prioridade');
        $chamado->titulo = $request->input('titulo');
        $chamado->descricao = $request->input('descricao');
        $chamado->status = $request->input('status');
        $chamado->update();
        return view("chamado.chamado",  [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }
}
