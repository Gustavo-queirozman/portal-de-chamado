@extends('layouts.sidebar2')
@section('title', 'Chamados')
@section('content')

<div class="flex wrap justify-center align-center h-100vh" style="padding-left: 70px;">
    <a href="/{{auth()->user()->type}}/usuarios" style="text-decoration: none;">
    <div class="flex column align-center w-m-260px m-5px  justify-center" style="border-radius: 5px; padding:5px; height:150px;  background-color:white;">
            <img src="../../img/usuarios.png" alt="gestão" style="width:25px">
            <br>
            <h5 style="height:20px; color: #00995D;">Gerenciar usuários</h5>
        </div>
    </a>

    <a href="/{{auth()->user()->type}}/chamado" style="text-decoration: none;">
    <div class="flex column align-center w-m-260px m-5px  justify-center" style="border-radius: 5px; padding:5px; height:150px;  background-color:white;">
            <img src="../../img/novo-chamado.png" alt="gestão" style="width:25px">
            <br>
            <h5 style="height:20px; color: #00995D;">Criar chamado</h5>
        </div>
    </a>

    <a href="/{{auth()->user()->type}}/chamados" style="text-decoration: none;">
        <div class="flex column align-center w-m-260px m-5px  justify-center" style="border-radius: 5px; padding:5px; height:150px;  background-color:white;">
            <img src="../../img/chamado-verde.png" alt="chamados" style="width:25px">
            <br>
            <h5 style="height:20px; color: #00995D;">Chamados</h5>
        </div>
    </a>

    @if(auth()->user()->type == 'adm')
    <a href="/{{auth()->user()->type}}/gestao" style="text-decoration: none;">
        <div class="flex column align-center w-m-260px m-5px  justify-center" style="border-radius: 5px; padding:5px; height:150px;  background-color:white;">
            <img src="../../img/gestao-verde.png" alt="gestão" style="width:25px">
            <br>
            <h5 style="height:20px; color: #00995D;">Gestão</h5>
        </div>
    </a>
    @endif
</div>

<style>
    .flex {
        display: flex;
    }

    .column {
        flex-direction: column;
    }

    .wrap {
        flex-wrap: wrap;
    }

    .align-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .w-m-260px {
        min-width: 220px;
    }

    .m-5px {
        margin: 5px;
    }

    .h-100vh {
        height: 100vh;
    }
</style>
@stop