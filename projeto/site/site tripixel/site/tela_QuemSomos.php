<!DOCTYPE html>
<html>
    <html lang="pt-br">
    <head>
        <title>TRIPIXEL STUDIOS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/logos/ícones/favicon_branco.ico" type="image/x-icon">

        <link rel="stylesheet" href="css/estilos_TELAS.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body style="background-image: linear-gradient(to bottom, rgb(36, 36, 36), rgb(92, 92, 92));">
        <?php
            if(isset($_COOKIE['login_usuario']))
            {
                session_start();
                $nomeULog = $_SESSION['nomeULog'];
                $emailULog = $_SESSION['emailULog'];
                $senhaULog = $_SESSION['senhaULog'];
                $fotoULog = $_SESSION['fotoULog'];
        ?>
                <header>
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="../index.php"><img src="img/logos/LOGO_FUNDO_ROXO.png" width="75%" height="75%"></a>
                        
                        <div class="collapse navbar-collapse" id="textoNavbar">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="tela_Jogos.php">Jogos</a></li>
                                <li class="nav-item active"><a class="nav-link" href="tela_QuemSomos.php">Quem Somos <span class="sr-only">(Página atual)</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_Informacoes.php">Informações</a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_Suporte.php">Suporte</a></li>
                            </ul>
                            <span class="navbar-text">
                                <img src="upl/uploads/<?php echo($fotoULog) ?>" class="foto-perfil"> <label><?php echo($nomeULog); ?></label>
                            </span>
                        </div>
                    </nav>
                </header>

                <main class="corpo">
                    <div class="quem-somos">
                        <h1>CONHEÇA NOSSOS MEMBROS!!</h1>

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Lucas Leachi</button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <p>Lucas é o desenvolvedor front-end, desenvolvedor da criatividade e das ideias da empresa Tripixel Studios, 
                                            um membro fundamental do grupo para a criação do projeto como um todo. Ele estudou bastante para 
                                            alcançar o melhor resultado possível.</p>
                                        <p>Para que fosse viável a conclusão desse TCC, Lucas foi uma das peças-chave.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Matheus Vitor Santos Sousa</button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Matheus é o desenvolvedor full stack, desenvolvedor do jogo e do aplicativo da empresa Tripixel Studios, 
                                                um membro fundamental do grupo para a criação do projeto como um todo. Ele estudou bastante para 
                                                alcançar o melhor resultado possível.</p>
                                            <p>Para que fosse viável a conclusão desse TCC, Matheus foi uma das peças-chave.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Murilo Rodrigues de Figueiredo</button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Murilo é o desenvolvedor back-end, desenvolvedor do site e das artes da empresa Tripixel Studios, 
                                            um membro fundamental do grupo para a criação do projeto como um todo. Ele estudou bastante para 
                                            alcançar o melhor resultado possível.</p>
                                        <p>Para que fosse viável a conclusão desse TCC, Murilo foi uma das peças-chave.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        <?php
            }
            else
            {
                echo('<script> alert(\'Você não tem acesso à essa tela. Faça login para ter permissão.\'); <script>');
                echo('<meta http-equiv="refresh" content="0 URL=index.php">');
            }
        ?>
    </body>
</html>