@extends('layouts.sidebar2')
@section('title', 'Chamados')
@section('content')
<!--Biblioteca do Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="d-flex align-items-center justify-content-center" style="padding-left:70px">
    <div class="card w-75">
        <div class="card-header"><b>Novo chamado</b></div>

        <div class="card-body">
            <form action="/{{auth()->user()->type}}/chamado/{{optional($chamado)['id']}}" method="post">
                @csrf
                <!-- columns -->
                <div class="form-group">
                    <div class="form-row align-items-center" style="display:flex;">
                        <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                            <!-- select -->
                            <label for="tipo">Categoria*</label>
                            <select class="form-control custom-select " name="categoria" id="categoria">
                                <option value="{{optional($chamado)['categoria']}}">{{optional($chamado)['categoria']}}</option>
                                <option value="1">Sistemas</option>
                                <option value="2">Impressoras</option>
                                <option value="3">Telefonia</option>
                                <option value="4">Máquina</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                            <!-- select -->
                            <label for="subcategoria">Subcategoria*</label>
                            <select class="form-control custom-select" name="subcategoria" id="subcategoria">

                            </select>
                        </div>

                        <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                            <!-- select -->
                            <label for="select_id_8">Prioridade*</label>
                            <select class="form-control custom-select" name="prioridade" id="select_id_8">
                                <option value="{{optional($chamado)['prioridade']}}">{{optional($chamado)['prioridade']}}</option>
                                <option value="Normal" selected>Normal</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="display:flex;">
                    <!-- Input type text -->
                    <div class="col-md-8 mb-3" style="display:flex; flex-direction:column;">
                        <label for="titulo">Titulo*</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" value="{{ optional($chamado)['titulo'] }}" required>
                    </div>
                    <div class="col-md-4 mb-3" style="display:flex; flex-direction:column;">
                        <!-- select -->
                        <label for="tipo">Setor de Atendimento*</label>
                        <select class="form-select" aria-label="Default select example" name="setor">
                            <option selected>{{auth()->user()->setor}}</option>
                            <option value="Atendimento">Atendimento</option>
                            <option value="Atualização">Atualização</option>
                            <option value="Cadastro">Cadastro</option>
                            <option value="Diretoria">Diretoria</option>
                            <option value="Faturamento">Faturamento</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="Gerencia">Gerencia</option>
                            <option value="SAC">SAC</option>
                            <option value="TI">TI</option>
                            <option value="Vendas">Vendas</option>
                        </select>
                    </div>
                </div>

                <!-- textarea -->
                <div class="form-group">
                    <label for="descricao">Descrição*</label>
                    <!--<textarea class="form-control" rows="4" name="descricao" id="descricao"  required>{{ optional($chamado)['descricao']  }}</textarea>-->
                    <textarea name="descricao" id="editor" column="20" rows="4" required>{{ optional($chamado)['descricao']  }}</textarea>
                </div>

                <!-- columns 
                <div class="form-group">
                    <div class="form-row align-items-center" style="display:flex;">
                   
                        <div class="col-md-4 mb-3">
                       
                            <label for="status">Status</label>
                          
                            <select name="status" id="status"  class="form-control">
                                <option value="{{ optional($chamado)['status'] }}">{{optional($chamado)['status']}}</option>
                                <option value="Aberto">Aberto</option>
                                <option value="Em espera" selected>Em espera</option>
                                <option value="Fechado">Fechado</option>
                            </select>
                        </div>

                       
                        <div class="col-md-4 mb-3">
                            <label for="criado">Criado</label>
                            <input type="date" class="form-control" name="criado" id="criado" placeholder="placeholder" value="{{optional($chamado)['criado']}}" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="concluido">Concluído</label>
                            <input type="date" class="form-control" name="concluido" id="concluido" placeholder="placeholder" value="{{optional($chamado)['concluido']}}" disabled>
                        </div>
                    </div>
                </div>-->
               
                <div>
                    <br>
                    <input type="submit" value="Salvar" class="btn btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Mapear as categorias para as subcategorias correspondentes
        var categorias = {
            1: ['GIU', 'Cardio', 'Piramide', 'Hilum', 'Atena', 'MKSaúde', 'Service Desk', 'Portal Sin', 'Cardio Web', 'Serviços de E-mai', 'PAI(Plataforma Adinistrativa Integrada)', 'Monitoramento Assistencial', 'Site Institucional', 'Área Restrita', 'Segunda Via de Boletos', 'Área do Beneficiário', 'Canal do Beneficiário', 'Painel BI', 'WSD Intercâmbio', 'Outro'],
            2: ['Troca Tonner/Cilindro', 'Atolamento/Travamento', 'Falha ao Imprimir/Escanear', 'Outro'],
            3: ['Troncos Ocupados', 'Falha em Ligações', 'Adicionar Novo Ponto/Ramal', 'Outro'],
            4: ['Travamento', 'Lentidão', 'Auxilio com programas/sites', 'Periféricos', 'Monitor', 'Outro']
        };

        // Evento de mudança da categoria
        $('#categoria').change(function() {
            var categoriaSelecionada = $(this).val();
            var subcategorias = categorias[categoriaSelecionada];

            // Limpar as opções anteriores
            $('#subcategoria').empty();

            // Adicionar as opções das subcategorias
            $.each(subcategorias, function(index, value) {
                $('#subcategoria').append('<option value="' + value + '">' + value + '</option>');
            });
        });
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

@stop