@extends('layouts.sidebar2')
@section('title', 'Chamados')
@section('content')
<div class="d-flex align-items-center justify-content-center" style="padding-left:70px">
    <div class="card w-75">
        <div class="card-header"><b>Novo chamado</b></div>

        <div class="card-body">
            <form action="/adm/chamado/{{optional($chamado)['id']}}" method="post">
                @csrf
                <!-- columns -->
                <div class="form-group">
                    <div class="form-row align-items-center" style="display:flex;">
                        <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                            <!-- select -->
                            <label for="tipo">Tipo*</label>
                            <select class="custom-select" name="tipo" id="tipo">
                                <option value="{{optional($chamado)['tipo']}}">{{optional($chamado)['tipo']}}</option>
                                <option value="Software">Software</option>
                                <option value="Hardware">Hardware</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                            <!-- select -->
                            <label for="categoria">Categoria*</label>
                            <select class="custom-select" name="categoria" id="categoria">
                                <option value="{{optional($chamado)['categoria']}}" selected>{{optional($chamado)['categoria']}}</option>
                                <option value="sd">s</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                            <!-- select -->
                            <label for="select_id_8">Prioridade*</label>
                            <select class="custom-select" name="prioridade" id="select_id_8">
                                <option value="{{optional($chamado)['prioridade']}}">{{optional($chamado)['prioridade']}}</option>
                                <option value="Normal">Normal</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <!-- Input type text -->
                    <label for="titulo">Titulo*</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" value="{{ optional($chamado)['titulo'] }}" required>
                </div>

                <!-- textarea -->
                <div class="form-group">
                    <label for="descricao">Descrição*</label>
                    <textarea class="form-control" rows="4" name="descricao" id="descricao" value="{{optional($chamado)['descricao']}}" required></textarea>
                </div>

                <!-- columns -->
                <div class="form-group">
                    <div class="form-row align-items-center" style="display:flex;">
                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" id="status" value="{{optional($chamado)['status']}}" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label for="criado">Criado</label>
                            <input type="date" class="form-control" name="criado" id="criado" placeholder="placeholder" value="{{optional($chamado)['criado']}}" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <!-- Input type text -->
                            <label for="concluido">Concluído</label>
                            <input type="date" class="form-control" name="concluido" id="concluido" placeholder="placeholder" value="{{optional($chamado)['concluido']}}" disabled>
                        </div>
                    </div>
                </div>

                <div>
                    <input type="submit" value="Salvar" class="btn btn btn-success">
                </div>

            </form>
        </div>
    </div>
</div>

@stop