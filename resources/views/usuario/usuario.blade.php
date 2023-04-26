@extends('layouts.app1')
@section('title', 'Chamados')
@section('content')

<div id="scroll">
    <div class="d-flex column">
        <form action="/adm/usuario/{{$usuario['id']}}" method="post" style="padding-left:70px">
            @csrf
            <input type="text" name="name" placeholder="Nome" value="{{$usuario['name']}}">
            <br>
            <input type="email" name="email" placeholder="E-mail" value="{{$usuario['email']}}">
            <br>
            <input type="text" name="username" placeholder="Usuário" value="{{$usuario['username']}}">
            <br>
            <input type="text" name="password" placeholder="Senha" value="{{$usuario['password']}}">
            <br>
            <select name="setor">
                <option value="{{$usuario['setor']}}">{{$usuario['setor']}}</option>
                <option value="Atendimento">Atendimento</option>
                <option value="Atualização">Atualização</option>
                <option value="Cadastro">Cadastro</option>
                <option value="Diretoria">Diretoria</option>
                <option value="Faturamento">Faturamento</option>
                <option value="Financeiro">Financeiro</option>
                <option value="Gerencia">Gerencia</option>
                <option value="SAC">SAC</option>
                <option value="Suporte TI">Suporte TI</option>
                <option value="Vendas">Vendas</option>
            </select>
            <br>
            <input type="text" name="ramal" placeholder="Ramal" value="{{$usuario['ramal']}}">
            <br>
            <input type="text" name="codAnydesk" placeholder="Anydesk" value="{{$usuario['codAnydesk']}}">
            <br>
            <input type="submit" value="Alterar">
        </form>
    </div>
</div>
@stop