<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesquisaChamadoController extends Controller
{

    public function search(Request $request){
        $idUsuario = auth()->user()->id;
        $codigoChamado = $request->input('codigoChamado');
        $tipoPesquisa = $request->input('tipoPesquisa');
        $dataInicial = $request->input('dataInicial');
        $dataFinal = $request->input('dataFinal');

        //2- Pesquisar chamados pelo tipo de chamado == hardware
        if ($tipoPesquisa == 'Hardware' && $dataInicial == null) {
            $chamados = DB::table('chamado')->where('tipo', '=', 'Hardware')->get();
            $chamados = json_decode($chamados, true);
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //3- Pesquisar chamados pelo tipo de chamado == software
        if ($tipoPesquisa == 'Software' && $dataInicial == null) {
            $chamados = DB::table('chamado')->where('tipo', '=', 'Software')->get();
            $chamados = json_decode($chamados, true);
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //4- Pesquisar chamados pelo numero do chamado
        if ($tipoPesquisa == 'codigoChamado' && $dataInicial == null) {
            $chamados = DB::table('chamado')->where('id', '=', $codigoChamado)->get();
            $chamados = json_decode($chamados, true);
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //5- Pesquisar chamados pelo tipo de chamado == hardware e data
        if ($tipoPesquisa == 'Hardware' && !empty($dataInicial) && !empty($dataFinal)) {
            $chamados = DB::table('chamado')
                ->where('tipo', '=', 'Hardware')
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            $chamados = json_decode($chamados, true);
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //6- Pesquisar chamados pelo tipo de chamado == software e data
        if ($tipoPesquisa == 'Software' && $dataInicial != null) {
            $chamados = DB::table('chamado')
                ->where('tipo', '=', 'Software')
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            $chamados = json_decode($chamados, true);
            return view('chamado.index',  [
                'chamados' => $chamados
            ]);
        }

        //montar pesquisa pegando todos os dados, nesse ceario os dados vem sem filtro
        $chamado = new Chamado();
        $chamados = $chamado->where('fkUsuario', $idUsuario)->get();
        $chamados = json_decode($chamados, true);
        return view('chamado.index',  [
            'chamados' => $chamados
        ]);
    }
}
