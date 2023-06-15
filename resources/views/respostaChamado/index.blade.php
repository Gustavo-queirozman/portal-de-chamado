<?php $respostas = json_decode($respostas, true);?>

@extends('layouts.sidebar2')
@section('title', 'Resposta chamado')
@section('content')
<div style="padding-left:70px;">
    <div style="height:100%; overflow-y: scroll;">
        @if(!empty($respostas))
        <div style="margin:20px; width:80%;">
            <h1 style="font-size:20px;">{{$respostas[0]['titulo']}}</h1>

            <form method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-row align-items-center" style="display:flex;">
                        @if(auth()->user()->type == 'adm' or auth()->user()->type == 'atendente')
                            <div class="col-md-4 mb-3">
                                <!--<label for="status">Status</label>-->
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected>Selectione o status...</option>
                                    <option value="Aberto">Aberto</option>
                                    <option value="Em espera">Em espera</option>
                                    <option value="Fechado">Fechado</option>
                                </select>
                            </div>
                        @endif
                    </div>
                </div>
                <div style="display:flex">
                    <input name="idChamado" type="hidden" value="{{$respostas[0]['id']}}" style="height:300px; width:500px; margin:0px;">
                    <div>
                        <textarea name="resposta" id="editor" placeholder="Responder.." column="20" row="20"></textarea>
                    </div>
                </div>
                <input type="submit" value="Enviar">
            </form>
            <br>
        </div>

        <div class="d-flex column" style="margin:20px;">
            @foreach ($respostas as $resposta)
            <div class="column">
                <div style="display: flex; flex-direction:row;">
                    <img style="width:30px; height:35px;" src="https://cdn-icons-png.flaticon.com/512/74/74472.png" alt="perfil">
                    <b style="font-size:16px;">{{$resposta['nome']}}</b>
                </div>

                <div class="text-left m-200px">
                    <span style="font-size:16px;"><?php echo $resposta['resposta'] ?></span>
                    <hr>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h3 style="text-align: center;">Aguardando resposta...</h3>
        @endif
    </div>
</div>


<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<style>

</style>
@stop