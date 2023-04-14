<?php
$respostas = json_decode($respostas, true); ?>

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
            <ul class="nav">
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

        <div style="width:100%">
            <div class="d-flex column" style="width:100%">
                <!DOCTYPE html>
                <html lang="pt-br">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="style.css">
                    <title>Document</title>
                </head>

                <body style="overflow-y: scroll;">
                    <div class="d-flex column">
                        <div style="margin:20px">
                            <h1>{{$respostas[0]['titulo']}}</h1>
                            <form action="/solicitante/chamado/ver" method="post">
                                @csrf
                                <input name="idChamado" type="hidden" value="{{$respostas[0]['id']}}">
                                <div >
                                    <textarea name="resposta" id="editor" placeholder="Responder.."></textarea>
                                    <strong>Status</strong>
                                    <select name="">
                                        <option value="">a</option>
                                        <option value="">b</option>
                                        <option value="">c</option>
                                        <option value="">d</option>
                                        <option value="">e</option>
                                        <option value="">f</option>
                                    </select>
                                </div>

                                <input type="submit" value="Enviar">
                            </form>
                            <br>
                        </div>

                        <div class="d-flex column" style="margin:20px">
                            @foreach ($respostas as $resposta)
                            <div class="column">
                                <div style="display: flex; flex-direction:row;">
                                    <img style="width:30px; height:35px;" src="https://cdn-icons-png.flaticon.com/512/74/74472.png" alt="perfil">
                                    <b>{{$resposta['nome']}}</b>
                                </div>

                                <div class="text-left m-200px">
                                    <?php echo $resposta['resposta'] ?>
                                    <hr>
                                </div>
                            </div>
                            @endforeach
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