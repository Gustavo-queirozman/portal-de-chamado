<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/app1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <body style="background-color: #f1f2f1; overflow: auto;">
        <div class="d-flex">
            <nav class="d-flex column bg-dark-green min-height-100vh" style="width: auto; position:fixed;">
                <ul style="list-style: none; padding:0px;">
                    <div>
                        <br><br>
                        <br><br>
                    </div>
                    <li class="nav-item active">
                        <a href="/{{auth()->user()->type}}/home" class="nav-link" style="width:100%;">
                            <img src="../../img/home.png" alt="Inicio" style="width: 25px;">
                        </a>
                    </li>
                    <br>
                    <li class="nav-item active">
                        <a href="@if(auth()->user()->type == 'adm')
                            /{{auth()->user()->type}}/usuarios
                        @else
                            /{{auth()->user()->type}}/usuario/{{auth()->user()->id}}
                        @endif" class="nav-link" style="width:100%;">
                            <img src="../../img/perfil.png" alt="Perfil" style="width: 25px;">
                        </a>
                    </li>
                    <br>
                    <li>
                        <a href="/{{auth()->user()->type}}/chamados" class="nav-link">
                            <img src="../../img/chamado.png" alt="Chamados" style="width: 25px;">
                        </a>
                    </li>
                    <br>
                    @if(auth()->user()->type == 'adm')
                    <li>
                        <a href="/{{auth()->user()->type}}/gestao" class="nav-link">
                            <img src="../../img/gestao.png" alt="Gestão" style="width: 25px;">
                        </a>
                    </li>
                    @endif
                    <br>
                    <li>
                        <a href="/logout" class="nav-link">
                            <img src="../../img/sair.png" alt="Sair" style="width: 25px;">
                        </a>
                    </li>
                </ul>
            </nav>

            <div style="width:100%;">
                <header class="bg-dark-green" style="display:flex; background-color:white; box-shadow: 0 1px 25px rgba(0,0,0,.16); padding-left:70px;">
                    <!--<div style="display:flex; align-items:center;">
                        <img src="https://www.unimed.coop.br/site/image/layout_set_logo?img_id=23230463&t=1681642264534" alt="logo" style="width:100px;">
                    </div>-->

                    <br><br><br>
                </header>
                <div class="d-flex column" style="width:100%; ">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <style>
            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            ::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 20px;

            }

            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            body {
                margin: 0px;
                padding: 0px;
                overflow-y: hidden;
            }

            #scroll {
                width: vmax;
                height: 100vmax;
                overflow-y: auto;
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
                background-color: #00995d;
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
    </body>

</html>