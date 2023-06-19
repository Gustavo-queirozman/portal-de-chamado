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

    /*
    public function create()
    {
        $type = auth()->user()->type;
        return view("$type.chamado.criar");
    }*/

    public function store(Request $request, $idUsuario)
    {
        //id do usuário
        //$idUsuario = auth()->user()->id;

        //tipo de chamado
        if ($request->input('categoria') == 1) {
            $tipoChamado = "Software";
            $subCategoria = "Sistemas";
        }
        if ($request->input('categoria') == '2') {
            $tipoChamado = "Hardware";
            $subCategoria = "Impressoras";
        }
        if ($request->input('categoria') == '3') {
            $tipoChamado = "Hardware";
            $subCategoria = "Telefonia";
        }
        if ($request->input('categoria') == "4") {
            $tipoChamado = "Hardware";
            $subCategoria = "Máquina";
        }

        //atendente
        if (auth()->user()->type == "atendente") {
            $atendente = auth()->user()->username;
        }
        
        Chamado::create([
            'tipo' => $tipoChamado,
            'categoria' => $request->input('categoria'),
            'subcategoria' => $subCategoria,
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            //'atendente' => $atendente,
            'setor'=> auth()->user()->type,
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
        //$idUsuario = auth()->user()->id;
        //tipo de chamado

        if ($request->input('categoria') == "1" or "Sistemas") {
            $tipoChamado = "Software";
            $categoria = "Sistemas";
        }
        if ($request->input('categoria') == "2" or "Impressoras") {
            $tipoChamado = "Hardware";
            $categoria = "Impressoras";
        }
        if ($request->input('categoria') == "3" or "Telefonia") {
            $tipoChamado = "Hardware";
            $categoria = "Telefonia";
        }
        if ($request->input('categoria') == "4" or "Máquina") {
            $tipoChamado = "Hardware";
            $categoria = "Máquina";
        }

        $chamado = Chamado::findOrFail($idChamado);
        $chamado->tipo = $tipoChamado;
        $chamado->categoria = $categoria;
        $chamado->subcategoria = $request->input('subcategoria');
        $chamado->prioridade = $request->input('prioridade');
        $chamado->titulo = $request->input('titulo');
        $chamado->descricao = $request->input('descricao');
        $chamado->status = $request->input('status');
        $chamado->update();
        $tipoUsuario = auth()->user()->type;
        return redirect($tipoUsuario . '/chamado/' . $idChamado);
    }
}
