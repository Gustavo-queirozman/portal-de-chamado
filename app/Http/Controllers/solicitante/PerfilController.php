<?php

namespace App\Http\Controllers\solicitante;

use App\Http\Controllers\Controller;
use App\Models\solicitante\Perfil;

use Illuminate\Http\Request;


class PerfilController extends Controller
{

    public function __construct()
    {
        
    }

    public function show()
    {
        //session_start();
        $idUsuario = 1;
        return view('solicitante.perfil.editar', [
            'usuario' => Perfil::findOrFail($idUsuario)
        ]);
    }

    public function edit(Request $request)
    {
        $idUsuario = 1;
        return view('solicitante.perfil.editar', [
            'usuario' => Perfil::findOrFail($idUsuario)
        ]);
    }

    public function update(Request $request)
    {
        $idUsuario = 1;
        $usuario = Perfil::findOrFail($idUsuario);

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->username = $request->input('username');
        $usuario->password = $request->input('password');
        $usuario->setor = $request->input('setor');
        $usuario->ramal = $request->input('ramal');
        $usuario->codAnydesk = $request->input('codAnydesk');

        $usuario->update();
        return view('solicitante.perfil.editar',  [
            'usuario' => Perfil::findOrFail($idUsuario)
        ] );
    }


    /*
    public function update(Request $request){
        echo("update");
        die();
        $usuario = new User();
        //$usuario->nome = $request->input('nome');
        //$usuario->email = $request->input('email');
        //$usuario->usuario = $request->input('usuario');
        //$usuario->senha = $request->input('senha');
        //$usuario->setor = $request->input('setor');
        //$usuario->ramal = $request->input('ramal');
        //$usuario->codAnydesk = $request->input('codAnydesk');
        $usuario->update($request->all());
        return view('index',$usuario);
        //$usuario = DB::table('usuario')->where('idUsuario',1)->update(['nome'=>'dfçsdmfç']);

        //return view('solicitante.perfil.editar')
        //return redirect()->back()->with('status','Student Updated Successfully');
    }

    public function show($id)
    {

        echo("show");
        die();
        session_start();
        $user = new User();
        $dados = $user->where('idUsuario', $id)->get();
        $nome = $dados[0]['nome'];
        $email = $dados[0]['email'];
        $usuario = $dados[0]['usuario'];
        $senha = $dados[0]['senha'];
        $setor = $dados[0]['setor'];
        $ramal = $dados[0]['ramal'];
        $codAnydesk = $dados[0]['codAnydesk'];
        return view('solicitante.perfil.ver', ['nome' => $nome, 'email'=>$email, 'usuario'=>$usuario, 'senha'=>$senha, 'setor'=>$setor, 'ramal'=>$ramal, 'codAnydesk'=>$codAnydesk]);
    }


    public function getEditar()
    {
        session_start();
        $idUsuario = 1;
        $user = new User();
        $dados = $user->where('idUsuario', $idUsuario)->get();
        $nome = $dados[0]['nome'];
        $email = $dados[0]['email'];
        $usuario = $dados[0]['usuario'];
        $senha = $dados[0]['senha'];
        $setor = $dados[0]['setor'];
        $ramal = $dados[0]['ramal'];
        $codAnydesk = $dados[0]['codAnydesk'];
        return view('solicitante.perfil.editar', ['nome' => $nome, 'email'=>$email, 'usuario'=>$usuario, 'senha'=>$senha, 'setor'=>$setor, 'ramal'=>$ramal, 'codAnydesk'=>$codAnydesk]);
    }

    public function postEditar(Request $request){
        print_r($request);
        return view('solicitante.perfil.editar',compact($request));
    }

    public function getVer()
    {
        session_start();
        $idUsuario = 1;
        $user = new User();
        $dados = $user->where('idUsuario', $idUsuario)->get();
        $nome = $dados[0]['nome'];
        $email = $dados[0]['email'];
        $usuario = $dados[0]['usuario'];
        $senha = $dados[0]['senha'];
        $setor = $dados[0]['setor'];
        $ramal = $dados[0]['ramal'];
        $codAnydesk = $dados[0]['codAnydesk'];
        return view('solicitante.perfil.ver', ['nome' => $nome, 'email'=>$email, 'usuario'=>$usuario, 'senha'=>$senha, 'setor'=>$setor, 'ramal'=>$ramal, 'codAnydesk'=>$codAnydesk]);
    }
*/
}
