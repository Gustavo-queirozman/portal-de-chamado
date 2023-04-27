<?php

namespace App\Http\Controllers;

use App\Models\RespostaChamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespostaChamadoController extends Controller
{
    public function index($idChamado)
    {
        $respostas = DB::table('respostachamado')
            ->select('fkChamado as id', DB::raw('(SELECT name FROM users WHERE id = fkUsuario) AS nome'), DB::raw('(SELECT titulo FROM chamado WHERE id = fkChamado) AS titulo'), 'resposta', 'dataHora')
            ->where('fkChamado', '=', $idChamado)
            ->orderBy('titulo')
            ->orderByDesc('dataHora')
            ->get();

        return view('chamado.chamado',  [
            'respostas' => $respostas
        ]);
    }

    public function store(Request $request)
    {
        $idUsuario = 1;
        $idChamado = $request->input('idChamado');
        
        RespostaChamado::create([
            'fkUsuario' => $idUsuario,
            'fkChamado' => $idChamado,
            'resposta' => $request->input('resposta')
        ]);

        return redirect("/solicitante/chamado/ver/$idChamado");
    }
}
