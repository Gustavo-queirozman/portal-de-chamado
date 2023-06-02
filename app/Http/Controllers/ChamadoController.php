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
        $idUsuario = auth()->user()->id;
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
        $type = auth()->user()->type;
        return view("$type.chamado.criar");
    }

    public function store(Request $request)
    {
        $idUsuario = auth()->user()->id;
        Chamado::create([
            'tipo' => $request->input('tipo'),
            'categoria' => $request->input('categoria'),
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'fkUsuario' => $idUsuario
        ]);
       return redirect('/adm/chamados');
    }

    public function edit($idChamado)
    {
        $chamado= Chamado::findOrFail($idChamado);
   
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
        $tipoUsuario = auth()->user()->type;
        return redirect($tipoUsuario.'/chamado/'.$idChamado);
    }
}
