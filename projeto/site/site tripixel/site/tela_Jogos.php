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
                                <li class="nav-item active"><a class="nav-link" href="tela_Jogos.php">Jogos <span class="sr-only">(Página atual)</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_QuemSomos.php">Quem Somos</a></li>
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
                    <div class="jogos">
                        <h1>CONHEÇA NOSSOS JOGOS!!</h1>

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <img src="img/icone_the_blind_monk.png" width="60px" height="60px"> <label style="margin-left: 10px; font-size: 26px;">THE BLIND MONK</label>                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-content">
                                            <div class="form-group">
                                                <label>DESCRIÇÃO: Jogue como um monge que perdeu sua visão, vivendo em uma cidade utópica lutando pelos seus direitos em intensos combates.</label>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>PREÇO: <span class="text-success">Grátis</span>.</label>
                                            </div>

                                            <div class="form-group">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                    </ol>

                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="img/foto_fundo_1.png" alt="Primeiro Slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="img/foto_fundo_2.png" width="" alt="Segundo Slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="img/foto_fundo_3.png" alt="Terceiro Slide">
                                                        </div>
                                                    </div>

                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Anterior</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Próximo</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br><button class="btn btn-success btn-block" style="margin-top: 10px;">DOWNLOAD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Demais Jogos...</button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Aqui ficariam os demais jogos...</p>
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