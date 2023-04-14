<?php

namespace App\Http\Controllers\autenticacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MudarSenhaController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return "dgsgdsgs";
    }

    public function mudarSenha(Request $request)
    {
        $novaSenha = "teste";
        $confirmarSenha = "teste";
        $novaSenha = 4835698;
        $idUsuario = 1; 

        if($novaSenha = $confirmarSenha){
            DB::table('usuario')
                ->where('id', $idUsuario)
                ->update(['senha' => $novaSenha]);
        }
    }
}
