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
        //mostrar apenas resposta do usuário que tem permissao para ver
        //apenas solicitante que n pode ver respostas de chamado de outras pessoas
        $respostas = DB::table('respostachamado')
            ->select('fkChamado as id', DB::raw('(SELECT name FROM users WHERE id = fkUsuario) AS nome'), DB::raw('(SELECT titulo FROM chamado WHERE id = fkChamado) AS titulo'), 'resposta', 'dataHora')
            ->where('fkChamado', '=', $idChamado)
            ->orderBy('titulo')
            ->orderByDesc('dataHora')
            ->get();

        $idUsuariorRespostaChamado = $respostas[0]->id;
        $tipoUsuario = auth()->user()->type;
        if (auth()->user()->type != "atendente" or auth()->user()->type != "adm") {
            if (auth()->user()->id != $idUsuariorRespostaChamado) {
                return redirect($tipoUsuario . '/resposta-chamado' . '/' . auth()->user()->id);
            }
        }

        if(count($respostas->all()) > 0){
            return view('respostaChamado.index',  [
                'respostas' => $respostas
            ]);
        }
        
        return view('respostaChamado.index',  [
            'respostas' => null
        ]);
    }

    public function store(Request $request, $idChamado)
    {
   
        //modificar data de concluido
        //mudar status
        //alterar atendente na tabela de chamado
        if (auth()->user()->type == 'atendente' or auth()->user()->type == 'adm') {
            $chamado = Chamado::findOrFail($idChamado);
            $chamado->atendente = auth()->user()->username;
            $chamado->save();
        }
        $chamado = Chamado::findOrFail($idChamado);
        $chamado->status = $request->input('status');
        if ($request->input('status') == "Fechado") {
            $chamado->concluidoDataHora = date("Y-m-d H:m:s");
        }
        $chamado->save();
        $idUsuario = auth()->user()->id;

        RespostaChamado::create([
            'fkUsuario' => $idUsuario,
            'fkChamado' => $idChamado,
            'resposta' => $request->input('resposta')
        ]);

        $tipoUsuario = auth()->user()->type;
        return redirect($tipoUsuario . '/resposta-chamado' . '/' . $idChamado);
    }
}
