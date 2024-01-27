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
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="../index.php"><img src="img/logos/LOGO_FUNDO_ROXO.png" width="75%" height="75%"></a>
                        
                        <div class="collapse navbar-collapse" id="textoNavbar">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="tela_Jogos.php">Jogos</a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_QuemSomos.php">Quem Somos</a></li>
                                <li class="nav-item active"><a class="nav-link" href="tela_Informacoes.php">Informações <span class="sr-only">(Página atual)</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_Suporte.php">Suporte</a></li>
                            </ul>
                            <span class="navbar-text">
                                <img src="upl/uploads/<?php echo($fotoULog) ?>" class="foto-perfil"> <label><?php echo($nomeULog); ?></label>
                            </span>
                        </div>
                    </nav>
                    
                <div class="corpo">
                    
                <main class="corpo">
                    <div class="informacoes">
                        <h1>SAIBA MAIS SOBRE NOSSA CAUSA!!</h1>

                        <div class="texto-informacoes">
                            <p>     Bem-vindo ao mundo inovador de Tripixel Studios, onde a paixão 
                                pela criação de experiências envolventes se encontra com um 
                                propósito maior - a conscientização sobre acessibilidade. Em 
                                nosso mais recente projeto, "The Blind Monk", mergulhamos nas 
                                profundezas da narrativa interativa para transmitir uma mensagem 
                                crucial sobre a importância da acessibilidade em todas as esferas 
                                da vida. Nosso jogo não é apenas uma jornada emocionante, mas 
                                também uma ponte para a compreensão das barreiras enfrentadas 
                                por indivíduos com deficiências.</p>
                            <p>     Em "The Blind Monk", os jogadores são convidados a experimentar 
                                o mundo através dos olhos de um monge cego, navegando por desafios 
                                inspirados na vida real. Cada obstáculo no jogo reflete as dificuldades 
                                diárias enfrentadas por aqueles que vivem com deficiências visuais. 
                                Queremos que os jogadores se sintam imersos e motivados a refletir sobre 
                                a importância de criar ambientes acessíveis, seja no mundo digital ou físico.</p>
                            <p>     Além da experiência de jogo única, Tripixel Studios está comprometida 
                                em promover a conscientização fora do universo virtual. Colaboramos 
                                com organizações dedicadas à acessibilidade para canalizar recursos e 
                                apoio para causas que buscam tornar o mundo mais inclusivo. Acreditamos 
                                que, ao unir entretenimento e responsabilidade social, podemos inspirar 
                                mudanças reais e duradouras na forma como percebemos e abordamos a acessibilidade.</p>
                            <p>     Junte-se a nós em "The Blind Monk" e embarque em uma jornada que vai além da 
                                diversão, promovendo uma compreensão mais profunda das necessidades das 
                                pessoas com deficiências. Em Tripixel Studios, acreditamos que, por meio 
                                da conscientização e da ação, podemos construir um futuro mais acessível e 
                                igualitário para todos.</p>
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