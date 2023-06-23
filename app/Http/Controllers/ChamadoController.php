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

    public function store(Request $request)
    {


        //id do usuário
        $idUsuario = auth()->user()->id;
        //tipo de chamado
        if ($request->input('categoria') == "1" or $request->input('categoria') == "Sistemas") {
            $tipoChamado = "Software";
            $categoria = "Sistemas";
        }
        if ($request->input('categoria') == "2" or $request->input('categoria') == "Impressoras") {
            $tipoChamado = "Hardware";
            $categoria = "Impressoras";
        }
        if ($request->input('categoria') == "3" or $request->input('categoria') == "Telefonia") {
            $tipoChamado = "Hardware";
            $categoria = "Telefonia";
        }
        if ($request->input('categoria') == "4" or $request->input('categoria') == "Máquina") {
            $tipoChamado = "Hardware";
            $categoria = "Máquina";
        }

        //atendente
        if (auth()->user()->type == "atendente") {
            $atendente = auth()->user()->username;
        } else {
            $atendente = NULL;
        }

        Chamado::create([
            'tipo' => $tipoChamado,
            'categoria' => $categoria,
            'subcategoria' => $request->input('subcategoria'),
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'atendente' => $atendente,
            'setor' => $request->input('setor'),
            'fkUsuario' => $idUsuario
        ]);
        $tipoUsuario = auth()->user()->type;
        return redirect("/$tipoUsuario/chamados");
    }

    public function edit($idChamado)
    {
        $tipoUsuario = auth()->user()->type;
        $chamado = Chamado::findOrFail($idChamado);
        $idUsuarioChamado = $chamado['fkUsuario'];

        if (auth()->user()->type != "atendente" or auth()->user()->type != "adm") {
            if (auth()->user()->id != $idUsuarioChamado) {
                return redirect($tipoUsuario . '/chamado' . '/' . auth()->user()->id);
            }
        }

        return view('chamado.chamado', [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function update(Request $request, $idChamado)
    {
        //$idUsuario = auth()->user()->id;
        //tipo de chamado
        $tipoUsuario = auth()->user()->type;
        $chamado = Chamado::findOrFail($idChamado);
        $idUsuarioChamado = $chamado['fkUsuario'];

        if (auth()->user()->type != "atendente" or auth()->user()->type != "adm") {
            if (auth()->user()->id != $idUsuarioChamado) {
                return redirect($tipoUsuario . '/chamado' . '/' . auth()->user()->id);
            }
        }

        if ($request->input('categoria') == '1' or $request->input('categoria') == 'Sistemas') {
            $tipoChamado = "Software";
            $categoria = "Sistemas";
        }
        if ($request->input('categoria') == "2" or $request->input('categoria') == "Impressoras") {
            $tipoChamado = "Hardware";
            $categoria = "Impressoras";
        }
        if ($request->input('categoria') == "3" or $request->input('categoria') == "Telefonia") {
            $tipoChamado = "Hardware";
            $categoria = "Telefonia";
        }
        if ($request->input('categoria') == "4" or $request->input('categoria') == "Máquina") {
            $tipoChamado = "Hardware";
            $categoria = "Máquina";
        }

        $chamado->tipo = $tipoChamado;
        $chamado->setor = $request->input('setor');
        $chamado->categoria = $categoria;
        $chamado->subcategoria = $request->input('subcategoria');
        $chamado->prioridade = $request->input('prioridade');
        $chamado->titulo = $request->input('titulo');
        $chamado->descricao = $request->input('descricao');
        $chamado->status = $request->input('status');
        $chamado->update();

        return redirect($tipoUsuario . '/chamado'.'/' . $idChamado);
    }
}
