<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ChamadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$idUsuario = auth()->user()->id;
        /*
        $chamados = DB::table('chamado')
        ->select('id','setor', 'tipo', 'categoria', 'subcategoria', 'titulo', 'prioridade', 'descricao', 'atendente', 'status', DB::raw('
            CASE
                WHEN TIMESTAMPDIFF(HOUR, criadoDataHora, concluidoDataHora) >= 24 THEN
                    CONCAT(TIMESTAMPDIFF(DAY, criadoDataHora, concluidoDataHora),
                    CASE
                        WHEN TIMESTAMPDIFF(DAY, criadoDataHora, concluidoDataHora) > 1 THEN " Dias"
                        ELSE " Dia"
                    END)
                ELSE
                    CONCAT(TIMESTAMPDIFF(HOUR, criadoDataHora, concluidoDataHora),
                    CASE
                        WHEN TIMESTAMPDIFF(HOUR, criadoDataHora, concluidoDataHora) != 1 THEN " Horas"
                        ELSE " Hora"
                    END)
            END AS tempo'))
        ->get();*/
        $chamados = DB::table('chamado')->get();
        $chamados = json_decode($chamados, true);

        return view('chamado.index',  [
            'chamados' => $chamados
        ]);
    }

    public function show()
    {
        return view('chamado.chamado',  [
            'chamado' =>  null
        ]);
    }

    public function create()
    {
        $type = auth()->user()->type;
        return view("$type.chamado.criar");
    }

    public function store(Request $request)
    {
        //id do usuário
        $idUsuario = auth()->user()->id;

        //tipo de chamado
        if ($request->input('categoria') == "Sistemas") {
            $tipoChamado = "Software";
        }
        if ($request->input('categoria') == "Impressoras") {
            $tipoChamado = "Hardware";
        }
        if ($request->input('categoria') == "Telefonia") {
            $tipoChamado = "Hardware";
        }
        if ($request->input('categoria') == "Máquina") {
            $tipoChamado = "Hardware";
        }

        //atendente
        if (auth()->user()->type == "atendente") {
            $atendente = auth()->user()->username;
        }

        Chamado::create([
            'tipo' => $tipoChamado,
            'categoria' => $request->input('categoria'),
            'subcategoria' => $request->input('subcategoria'),
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'atendente' => $atendente,
            'fkUsuario' => $idUsuario
        ]);
        $tipoUsuario = auth()->user()->type;
        return redirect("/$tipoUsuario/chamados");
    }

    public function edit($idChamado)
    {
        $chamado = Chamado::findOrFail($idChamado);

        return view('chamado.chamado', [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function update(Request $request, $idChamado)
    {
        dd('dfdsfsdf');
        $chamado = Chamado::findOrFail($idChamado);
        $chamado->tipo = $request->input('tipo');
        $chamado->categoria = $request->input('categoria');
        $chamado->prioridade = $request->input('prioridade');
        $chamado->titulo = $request->input('titulo');
        $chamado->descricao = $request->input('descricao');
        $chamado->status = $request->input('status');
        $chamado->update();
        $tipoUsuario = auth()->user()->type;
        return redirect($tipoUsuario . '/chamado/' . $idChamado);
    }
}
