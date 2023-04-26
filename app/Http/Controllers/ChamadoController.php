<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function __construct(){ 
    }

    public function index(){
        $idUsuario = 1;
        $chamado = new Chamado();
        $chamados = $chamado->where('fkUsuario', $idUsuario)->get();
        return view('chamado.index',  [
            'chamados' => $chamados
        ]); 
    }

    public function show(){
        $idUsuario = 1;
        $chamado = new Chamado();
        $chamados = $chamado->where('fkUsuario', $idUsuario)->get();
        return view('atendente.home',  [
            'chamados' => $chamados
        ]); 
    }
    
    public function create(){
        return view('atendente.chamado.criar');
    }

    public function store(Request $request){       
        Chamado::create([
            'tipo' => $request->input('tipo'),
            'categoria' => $request->input('categoria'),
            'prioridade' => $request->input('prioridade'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao')
        ]);

        return view('atendente.home');
    }


    public function edit($idChamado){
        return view('atendente.chamado.ver', [
            'chamado' => Chamado::findOrFail($idChamado)
        ]);
    }

    public function update(Request $request){
        $idChamado = 1;
        $chamado = Chamado::findOrFail($idChamado);
        $chamado->tipo = $request->input('tipo');
        $chamado->update();
        return view('atendente.chamado.editar',  [
            'chamado' => Chamado::findOrFail($idChamado)
        ] );
    }
}
