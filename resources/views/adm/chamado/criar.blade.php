<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex">
        <nav class="d-flex column bg-dark-green min-height-100vh" style="width: 200px">
            <ul>
                <li class="nav-item active">
                    <a href="/adm/perfil/editar" class="nav-link" style="width:100%;">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Meu perfil</span>
                    </a>
                </li>
                <br>
                <li class="nav-item active">
                    <a href="/adm/usuario" class="nav-link" style="width:100%;">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Usuário</span>
                    </a>
                </li>
                <br>
                <li>
                    <a href="/adm" class="nav-link">
                        <i class="person-16"></i>
                        <span>Chamados</span>
                    </a>

                    <ul>
                        <a href="/adm/chamado/ver"><li>Ver</li></a>
                        <a href="/adm/chamado/criar"><li>Criar</li></a>
                    </ul>
                </li>
                <br>
                <li>
                    <a href="/logout" class="nav-link">
                        <i class="person-16"></i>
                        <span>Sair</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div style="width:100%">
            <header class="bg-dark-green">
                <form action="" method="post" class="d-flex flex-center
                padding-top20px padding-bottom20px">
                    <input type="text" name="palavra" placeholder="Palavra chave..." class="form-control m-5px">
                    <select name="" class="form-control m-5px">
                        <option value="">Código chamado</option>
                        <option value="">Tipo chamado</option>
                    </select>
                    <input type="date" name="dataInicial" class="form-control
                    m-5px">
                    <input type="date" name="dataFinal" class="form-control m-5px">
                    <button type="submit" class="form-control m-5px">Pesquisar</button>
                </form>
            </header>

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

        <title>Chamado</title>
    </head>
    <body>
        <br>
        <div class="d-flex align-items-center justify-content-center">
            <div class="card w-75">
                <div class="card-header"><b>Novo chamado</b></div>

                <div class="card-body">
                    <form action="/adm/chamado/criar" method="post">
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

        </div>
    </div>

    <style>
        body {
            margin: 0px;
            padding: 0px;
            overflow-y: hidden;
        }

        #scroll {
            width: vmax;
            height: 45vmax;
            overflow-y: scroll;


        }

        .d-flex {
            display: flex;
        }

        .flex-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .column {
            flex-direction: column;
        }

        .row {
            flex-direction: row;
        }

        .bg-dark-green {
            background-color: #035F54;
        }

        .list-style-none {

            list-style-type: none;
        }

        .padding-top20px {
            padding-top: 20px;
        }

        .padding-bottom20px {
            padding-bottom: 20px;
        }

        .form-control {
            min-height: 35px;
            min-height: 35px;
        }

        .m-5px {
            margin: 5px;
        }

        .p-0px {
            padding: 0px;
        }

        .border-1px {
            border: 1px solid black;
        }

        .min-height-100vh {
            min-height: 100vh;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>