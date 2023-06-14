@extends('layouts.sidebar1')
@section('title', 'Chamados')
@section('content')
<ul id="scroll" style="display:flex; flex-direction:column; align-items:center; list-style:none;">
<br>
    @foreach ($chamados as $chamado)
    <div class="width:100%; display:flex; justify-content:center; margin:0px; align-items:center">
        <div class="d-flex justify-between" style="justify-content: space-around;
                                align-items:center; background-color: white; width:700px; padding: 20px; border-radius:7px;">
            <div class="d-flex column">
                <div style="display:flex; align-items:center;">
                    <h6 style="font-size:20px;">@Gustavo Queiroz -&nbsp;</h6>
                    <h4 style="font-size:20px;">{{$chamado['titulo']}}</h4>
                </div>

                <ul class="d-flex" class="list-style-none" style="padding:0px; list-style:none; font-size:15px ">
                    <li style="margin-right:20px;">
                        <img src="../img/ferramenta.png" alt="" style="width:15px">
                        <span>{{$chamado['tipo']}}</span>
                    </li>
                    <li style="margin-right:20px">
                        <img src="../img/localizacao.png" alt="tempo" style="width:15px">
                        <span>{{$chamado['setor']}}</span>
                    </li>
                    <li style="margin-right:20px">
                        <img src="../img/status.png" alt="tempo" style="width:15px">
                        <span>{{$chamado['status']}}</span>
                    </li>
                    <li style="margin-right:20px">
                        <img src="../img/relogio.png" alt="tempo" style="width:15px">
                        <span>há 4 Dias</span>
                    </li>
                </ul>
            </div>

            <div>
                <a href="/{{auth()->user()->type}}/resposta-chamado/{{$chamado['id']}}"><button style="border:0px; padding:10px; border-radius:7px; font-size:15px;">Informações</button></a>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</ul>
@stop