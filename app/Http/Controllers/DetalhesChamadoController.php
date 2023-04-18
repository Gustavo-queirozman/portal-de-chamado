<?php

namespace App\Http\Controllers;

use App\Models\solicitante\detalhesChamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalhesChamadoController extends Controller
{
    public function show($idChamado)
    {
        $idUsuario = 1;
        /*$respostas = DB::table("respostachamado")
        ->select("respostachamado.id", 
                 DB::raw("(select name from users WHERE id = $idUsuario) as nome"),
                 DB::raw("(select titulo from chamado WHERE id = $idChamado) as titulo"),
                 "resposta",
                 "dataHora")
        ->where("fkChamado", "=", $idChamado)
        ->orderBy("dataHora", "desc")
        ->get();*/

        $respostas = DB::table('respostachamado')
        ->select('fkChamado as id', DB::raw('(SELECT name FROM users WHERE id = fkUsuario) AS nome'), DB::raw('(SELECT titulo FROM chamado WHERE id = fkChamado) AS titulo'), 'resposta', 'dataHora')
        ->where('fkChamado', '=', $idChamado)
        ->orderBy('titulo')
        ->orderByDesc('dataHora')
        ->get();

        return view('solicitante.chamado.ver',  [
            'respostas' => $respostas
        ]);
    }

    public function edit()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $idUsuario = 1;
        $idChamado = $request->input('idChamado');

        detalhesChamado::create([
            'fkUsuario' => $idUsuario,
            'fkChamado' => $idChamado,
            'resposta' => $request->input('resposta')
        ]);

        return redirect("/solicitante/chamado/ver/$idChamado");
    }
}
