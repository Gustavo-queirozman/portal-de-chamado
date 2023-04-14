<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--CSS-->



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <div class="d-flex" >
        <nav class="d-flex column bg-dark-green min-height-100vh" style="width: 200px">
            <ul class="nav" style="list-style-type: none;">
                <li class="nav-item active">
                    <a href="/solicitante/perfil/editar" class="nav-link" style="width:100%;">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Meu perfil</span>
                    </a>
                </li>
                <br>
                <li>
                    <a href="/solicitante" class="nav-link">
                        <i class="person-16"></i>
                        <span>Chamados</span>
                    </a>
                </li>
                <br>
                <li>
                    <a href="/entrar" class="nav-link">
                        <i class="person-16"></i>
                        <span>Sair</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div style="width:100%;">
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

            <div class="d-flex column" style="width:100%">
                <!DOCTYPE html>
                <html lang="pt-br">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                    <title>Perfil</title>
                </head>

                <body style="background-color: #F5F5F5">
                    <br><br>
                    <div class="d-flex align-center justify-content-center ">
                        <div class="card w-75" style="border-radius:10px">
                            <div class="card-header"><b>Atualizar perfil</b></div>
                            <div class="card-body">
                                <form action="/solicitante/perfil/editar" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nome">Nome*</label>
                                        <input type="text" class="form-control" name="name" value="{{$usuario['name']}}" id="name" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row align-items-center">
                                            <div class="col-md-4 mb-3">
                                                <label for="email">Email*</label>
                                                <input type="email" class="form-control" name="email" value="{{$usuario['email']}}" id="email" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="usuario">Usuário*</label>
                                                <input type="text" class="form-control" name="username" id="usuario" value="{{$usuario['username']}}" required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="senha">Senha*</label>
                                                <input type="password" class="form-control" name="password" id="senha" value="{{$usuario['password']}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row align-items-center">
                                            <div class="col-md-4 mb-3">
                                                <label for="setor">Setor*</label>
                                                <select class="custom-select" name="setor" id="setor">
                                                    <option value="{{$usuario['setor']}}">{{$usuario['setor']}}</option>
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
                                            <div class="col-md-4 mb-3">
                                                <label for="ramail">Ramal</label>
                                                <input type="text" class="form-control" name="ramal" id="ramal" value="{{$usuario['ramal']}}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="codAnydesk">Código do Anydesk</label>
                                                <input type="text" class="form-control" name="codAnydesk" value="{{$usuario['codAnydesk']}}" id="codAnydesk">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary" name="button">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </body>

                </html>

            </div>
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