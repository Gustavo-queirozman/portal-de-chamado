<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesquisaUsuarioController extends Controller
{

    public function search(Request $request)
    {
        $idUsuario = auth()->user()->id;
        $palavraChave = $request->input('palavraChave');
        $tipoPesquisa = $request->input('tipoPesquisa');
        $dataInicial = $request->input('dataInicial');
        $dataFinal = $request->input('dataFinal');

        //1- pesquisar por e-mail
        if ($tipoPesquisa == 'Email' && empty($dataInicial)) {
            $usuarios = DB::table('users')
                ->where('email', 'LIKE', "%$palavraChave%")
                ->get();

            return view('usuario.index', [
                'usuarios' => $usuarios
            ]);
        }

        //2- pesquisar por nome 
        if ($tipoPesquisa == 'Nome' && empty($dataInicial)) {
            $usuarios = DB::table('users')
                ->where('name', 'LIKE', "%$palavraChave%")
                ->get();

            return view('usuario.index', [
                'usuarios' => $usuarios
            ]);
        }

        //3- pesquisar por usuário
        if ($tipoPesquisa == 'Usuario' && empty($dataInicial)) {
            $usuarios = DB::table('users')
                ->where('username', 'LIKE', "%$palavraChave%")
                ->get();

            return view('usuario.index', [
                'usuarios' => $usuarios
            ]);
        }

        //4- pesquisar por nome e intervalo de datas
        if ($tipoPesquisa == 'Nome' && $dataInicial != null) {
            $usuarios = DB::table('users')
                ->where('name', 'LIKE', "%$palavraChave%")
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            //$usuarios = json_decode($usuarios, true);
            return view('usuario.index',  [
                'usuarios' => $usuarios
            ]);
        }

        //5- pesquisar por email e intervalo de datas
        if ($tipoPesquisa == 'Email' && $dataInicial != null) {
            $usuarios = DB::table('users')
                ->where('email', 'LIKE', "%$palavraChave%")
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            //$usuarios = json_decode($usuarios, true);
            return view('usuario.index',  [
                'usuarios' => $usuarios
            ]);
        }

        //6- pesquisar por usuario e intervalo de datas
        if ($tipoPesquisa == 'Usuario' && $dataInicial != null) {
            $usuarios = DB::table('users')
                ->where('username', 'LIKE', "%$palavraChave%")
                ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
                ->get();
            //$usuarios = json_decode($usuarios, true);
            return view('usuario.index',  [
                'usuarios' => $usuarios
            ]);
        }

        //7- pesquisar por intervalo de datas
        if($dataInicial != null && $dataFinal != null && empty($palavraChave)){
            $usuarios = DB::table('users')
            ->whereBetween('criadoDataHora', [$dataInicial, $dataFinal])
            ->get();
            return view('usuario.index',  [
                'usuarios' => $usuarios
            ]);
        }

        //8- pesquisar todos os dados sem filtrar
        $usuarios = DB::table('users')->select('id', 'name', 'email', 'username')->get();
        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
        
    }
}
