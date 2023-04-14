<?php

namespace App\Http\Controllers\autenticacao;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User;
use App\Mail\resetarSenhaMail;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EsqueciSenhaController extends Controller
{

    public function enviarNovaSenhaNoEmail(Request $request)
    {

        $email = $request->input('email');
        //gerar senha aleatoria
        $novaSenha = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        //alterar no banco de dados
        DB::table('usuario')
            ->where('email', $email)
            ->update(['senha' => $novaSenha]);

        $mailData = [
            'title' => 'Nova senha',
            'body' => "Sua nova senha é: $novaSenha",
            'senha' => $novaSenha
        ];

        //Endereço de email para receber o email
        Mail::to($request->input('email'))->send(new resetarSenhaMail($mailData));

        dd('Email enviado com sucesso!');
    }
}
