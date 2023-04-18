
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="refresh" content="5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex">
        <nav class="d-flex column bg-dark-green min-height-100vh" style="width: 200px">
            <ul class="nav" style="display:flex; flex-direction:column;">
                <li class="nav-item active">
                    <a href="/atendente/perfil/editar" class="nav-link" style="width:100%;">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Meu perfil</span>
                    </a>
                </li>
                <br>
                <li>
                    <a href="/atendente" class="nav-link">
                        <i class="person-16"></i>
                        <span>Chamados</span>
                    </a>
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

            <div class="d-flex column" style="width:100%">
                <ul id="scroll">
                    <br>
                    <br>

                    @foreach ($chamados as $chamado)
                        <div class="d-flex justify-between" style="justify-content: space-around;
                            align-items:center;">
                            <div class="d-flex column">
                                <b>@Gustavo Queiroz - {{$chamado['titulo']}}</b>
                                <ul class="d-flex" style="padding:0px" class="list-style-none">
                                    <li style="margin-right:20px">
                                        <i></i>
                                        <span>{{$chamado['tipo']}}</span>
                                    </li>
                                    <li style="margin-right:20px">
                                        <i></i>
                                        <span>Suporte TI</span>
                                    </li>
                                    <li style="margin-right:20px">
                                        <i></i>
                                        <span>{{$chamado['status']}}</span>
                                    </li>
                                    <li style="margin-right:20px">
                                        <i></i>
                                        <span>4 Dias</span>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <a href="/atendente/chamado/ver/{{$chamado['id']}}"><button>Informações</button></a>
                            </div>

                        </div>
                        <br>
                    @endforeach


                </ul>
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