<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\RespostaChamado;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespostaChamadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idChamado)
    {
        $respostas = DB::table('respostachamado')
            ->select('fkChamado as id', DB::raw('(SELECT name FROM users WHERE id = fkUsuario) AS nome'), DB::raw('(SELECT titulo FROM chamado WHERE id = fkChamado) AS titulo'), 'resposta', 'dataHora')
            ->where('fkChamado', '=', $idChamado)
            ->orderBy('titulo')
            ->orderByDesc('dataHora')
            ->get();
        return view('respostaChamado.index',  [
            'respostas' => $respostas
        ]);
    }

    public function store(Request $request)
    {
        //modificar data de concluido
        //mudar status
        $chamado = Chamado::findOrFail($request->input('idChamado'));
        $chamado->status = $request->input('status');
        if( $request->input('status') == "Fechado"){
            $chamado->concluidoDataHora = date("Y-m-d H:m:s");
        }
        $chamado->save();

        $idUsuario = 1;
        $idChamado = $request->input('idChamado');
        RespostaChamado::create([
            'fkUsuario' => $idUsuario,
            'fkChamado' => $idChamado,
            'resposta' => $request->input('resposta')
        ]);
        $tipoUsuario = auth()->user()->type;
        return redirect($tipoUsuario.'/resposta-chamado/'.$idChamado);
    }
}
