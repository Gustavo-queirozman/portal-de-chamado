<?php $usuarios = json_decode($usuarios, true); ?>

@extends('layouts.app1')
@section('title', 'Chamados')
@section('content')

@foreach ($usuarios as $usuario)
<div class="d-flex justify-between" style="justify-content: space-around; align-items:center;">
    <div class="d-flex column">
        <ul class="d-flex" style="padding:0px" class="list-style-none">
            <li style="margin-right:20px">
                <i>@ {{$usuario['username']}}</i>
            </li>
            <li style="margin-right:20px">
                <i>{{$usuario['name']}}</i>
            </li>
            <li style="margin-right:20px">
                <i>{{$usuario['email']}}</i>
            </li>
        </ul>
    </div>

    <div style="display:flex">
        <a href="/adm/usuario/{{$usuario['id']}}"><input class="btn btn-default" type="submit" value="Atualizar" /></a>
        <form action="/adm/usuario/{{$usuario['id']}}" method="post">
            <input class="btn btn-default" type="submit" value="Deletar" />
            @method('Delete')
            @csrf
        </form>
    </div>
</div>
<br>
@endforeach


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@stop