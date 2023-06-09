<?php $usuarios = json_decode($usuarios, true); ?>

@extends('layouts.sidebar-usuarios')
@section('title', 'Chamados')
@section('content')

<br>
@foreach ($usuarios as $usuario)
<div style="width:100%; display:flex; justify-content:center; margin:0px; align-items:center">
    <div class="d-flex justify-between" style="justify-content: space-around; align-items:center; background-color: white; width:700px; padding: 20px; border-radius:7px;">
    <div class="d-flex column" >
        <ul class="d-flex" style="padding:0px; margin-bottom:0px; list-style:none" class="list-style-none">
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
        <a href="/{{auth()->user()->type}}/usuario/{{$usuario['id']}}">
            <img src="../../img/editar.png" alt="editar" style="width:25px;">
        </a>

        <form action="/{{auth()->user()->type}}/usuario/{{$usuario['id']}}" method="post">
            <button type="submit" type="submit" style="border:1px solid transparent; background-color:white;">
            <img src="../../img/delete.png" alt="deletar" style="width:25px">
            @method('Delete')
            @csrf
        </form>
    </div>


    </div>
</div>
<br>
@endforeach


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@stop