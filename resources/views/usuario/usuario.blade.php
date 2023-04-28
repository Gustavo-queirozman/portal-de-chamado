@extends('layouts.sidebar1')
@section('title', 'Usuário')
@section('content')

<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</header>
<div id="scroll">
    <div class="d-flex column">
        <form action="/adm/usuario/{{ optional($usuario)['id'] }}" method="post" style="padding-left:70px">
            @csrf
            <input type="hidden" name="id" value="{{ optional($usuario)['id'] }}">
            <br>
            <input type="text" name="name" placeholder="Nome" value="{{ optional($usuario)['name'] }}">
            <br>
            <input type="email" name="email" placeholder="E-mail" value="{{ optional($usuario)['email'] }}">
            <br>
            <input type="text" name="username" placeholder="Usuário" value="{{ optional($usuario)['username'] }}">
            <br>
            <input type="text" name="password" placeholder="Senha" value="{{ optional($usuario)['password'] }}">
            <br>
            <select name="setor">
                <option value="{{optional($usuario)['setor']}}">{{optional($usuario)['setor']}}</option>
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
            <input type="text" name="ramal" placeholder="Ramal" value="{{optional($usuario)['ramal']}}">
            <br>
            <input type="text" name="codAnydesk" placeholder="Anydesk" value="{{optional($usuario)['codAnydesk']}}">
            <br>
            <input type="submit" value="Salvar">
        </form>
    </div>
</div>







@extends('layouts.sidebar1')
@section('title', 'Usuário')
@section('content')

<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</header>

<div style="padding-left: 70px; display:flex; justify-content:center; height:100vh; align-items:center">
    <div class="card">
        <div class="card-header" style="font-size:20px; background-color: #00995D; color:white;">Usuário</div>
        <div class="card-body">
            <form action="/adm/usuario/{{ optional($usuario)['id'] }}" method="post">
                <!-- Input type text -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="name" value="{{optional($usuario)['name']}}" required>
                </div>

                <!-- Input type text -->
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{optional($usuario)['email']}}" required>
                </div>

                <!-- columns -->
                <div class="form-group">
                    <div class="form-row align-items-center">
                        <div class="col-md-6 mb-3">
                            <!-- Input type text -->
                            <label for="usuario">Usuário</label>
                            <input type="text" class="form-control" name="username" id="usuario" value="{{optional($usuario)['username']}}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <!-- Input type text -->
                            <label for="senha">Senha</label>
                            <input type="text" class="form-control" name="password" id="senha" value="{{optional($usuario)['password']}}">
                        </div>

                    </div>

                </div>

                <!-- columns -->
                <div class="form-group">
                    <div class="form-row align-items-center">
                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label for="setor">Setor</label>
                            <input type="text" class="form-control" name="setor" id="setor" value="{{optional($usuario)['setor']}}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label for="ramal">Ramal</label>
                            <input type="text" class="form-control" name="ramal" id="ramal" value="{{optional($usuario)['ramal']}}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label>Anydesk</label>
                            <input type="text" class="form-control" name="codAnydesk" id="anydesk" value="{{optional($usuario)['codAnydesk']}}">
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-success" name="submit" id="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>

<style>
    label {
        margin-bottom: 0px;
    }
</style>
@stop
@stop