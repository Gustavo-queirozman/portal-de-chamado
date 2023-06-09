@extends('layouts.sidebar2')
@section('title', 'Usuário')
@section('content')

<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</header>

<div style="padding-left: 70px; display:flex; justify-content:center; height:100vh; align-items:center">
    <div class="card">
        <div class="card-header" style="font-size:20px; background-color: #00995D; color:white;">Usuário</div>
        <div class="card-body">
            <form action="/{{auth()->user()->type}}/usuario/{{optional($usuario)['id']}}" method="post">
                @csrf
                <!-- Input type text -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{optional($usuario)['name']}}" required>
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
                
                <div class="form-group">
                    <div class="form-row align-items-center">
                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label>Nível de permissão</label>
                            <input type="text" class="form-control" name="type" id="type" value="{{optional($usuario)['type']}}">
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-success">Salvar</button>
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