<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <meta http-equiv="refresh" content="10">
        <title>Chamado</title>
    </head>
    <body>
        <br>
        <div class="d-flex align-items-center justify-content-center">
            <div class="card w-75">
                <div class="card-header"><b>Novo chamado</b></div>

                <div class="card-body">
                    <form action="/solicitante/chamado/criar" method="post">
                        @csrf
                        <!-- columns -->
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-md-4 mb-3">
                                    <!-- select -->
                                    <label for="tipo">Tipo*</label>
                                    <select class="custom-select" name="tipo"
                                        id="tipo">
                                        <option value="Software">Software</option>
                                        <option value="Hardware">Hardware</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <!-- select -->
                                    <label for="categoria">Categoria*</label>
                                    <select class="custom-select"
                                        name="categoria" id="categoria">
                                        <option value="sd" selected>s</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <!-- select -->
                                    <label for="select_id_8">Prioridade*</label>
                                    <select class="custom-select"
                                        name="prioridade" id="select_id_8">
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
                            <input type="text" class="form-control"
                                name="titulo" id="titulo" required>
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label for="descricao">Descrição*</label>
                            <textarea class="form-control" rows="4" name="descricao" id="descricao" required></textarea>
                        </div>

                        <!-- columns -->
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-md-4 mb-3">
                                    <!-- Input type text -->
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control"
                                        name="status" id="status" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <!-- Input type text -->
                                    <label for="criado">Criado</label>
                                    <input type="date" class="form-control"
                                        name="criado" id="criado"
                                        placeholder="placeholder" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <!-- Input type text -->
                                    <label for="concluido">Concluído</label>
                                    <input type="date" class="form-control"
                                        name="concluido" id="concluido"
                                        placeholder="placeholder" disabled>
                                </div>

                            </div>

                        </div>

                        <div>
                            <input type="submit" value="Criar" class="btn btn btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <br>
    </body>
</html>
