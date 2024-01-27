<!DOCTYPE html>
<html>
    <html lang="pt-br">
    <head>
        <title>TRIPIXEL STUDIOS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/logos/ícones/favicon_branco.ico" type="image/x-icon">

        <link rel="stylesheet" href="css/estilos_TELAS.css">
        <script src="js/rotinas_TELAS.js" defer></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body style="background-image: linear-gradient(to bottom, rgb(36, 36, 36), rgb(92, 92, 92)); z-index: 0;">
        <?php
            if(isset($_COOKIE['login_usuario']))
            {
                session_start();
                $nomeULog = $_SESSION['nomeULog'];
                $emailULog = $_SESSION['emailULog'];
                $senhaULog = $_SESSION['senhaULog'];
                $fotoULog = $_SESSION['fotoULog'];

                if(isset($_REQUEST['mensagem']) && ($_REQUEST['mensagem'] == 'enviada'))
                {
                    echo('<script> alert(\'Sua mensagem foi enviada.\'); </script>');
                    echo('<meta http-equiv="refresh" content="0 URL=tela_SUPORTE.php">');
                }
        ?>
                <header>
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="../index.php"><img src="img/logos/LOGO_FUNDO_ROXO.png" width="75%" height="75%"></a>
                        
                        <div class="collapse navbar-collapse" id="textoNavbar">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="tela_Jogos.php">Jogos</a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_QuemSomos.php">Quem Somos</a></li>
                                <li class="nav-item"><a class="nav-link" href="tela_Informacoes.php">Informações</a></li>
                                <li class="nav-item active"><a class="nav-link" href="tela_Suporte.php">Suporte <span class="sr-only">(Página atual)</span></a></li>
                            </ul>
                            <span class="navbar-text">
                                <img src="upl/uploads/<?php echo($fotoULog) ?>" class="foto-perfil"> <label><?php echo($nomeULog); ?></label>
                            </span>
                        </div>
                    </nav>
                </header>

                <div class="container">
                    <main class="corpo">
                        <div class="suporte">
                            <h1>ACESSE NOSSO SUPORTE!!</h1>
    
                            <div style="display: inline-flex;">
                                <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 20px; justify-content: center; align-items: center;">
                                    <div class="card-body">
                                        <h5 class="card-title">FALE CONOSCO</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Mande sua dúvida para nós respondermos.</h6><br>
                                        <a role="button" id="btnAbrirFaleConosco" data-toggle="collapse" href="#popupFaleConosco" aria-expanded="false" aria-controls="popupFaleConosco" class="card-link btn btn-block btn-info">Abrir</a>
                                    </div>
                                </div>
        
                                <div class="card" style="width: 18rem; margin-top: 20px; justify-content: center; align-items: center;">
                                    <div class="card-body">
                                        <h5 class="card-title">FAQ</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Veja as perguntas mais frequentes que recebemos.</h6><br>
                                        <a role="button" id="btnAbrirFaq" data-toggle="collapse" href="#popupFaq" aria-expanded="false" aria-controls="popupFaq" class="card-link btn btn-block btn-info">Abrir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>

                <div class="sobreposicao"></div>

                <div class="collapse popup-fale-conosco" id="popupFaleConosco" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                    <img src="img/btn_fechar.png" id="btnFecharFaleConosco" class="btn-fechar" role="button" data-toggle="collapse" href="#popupFaleConosco" aria-expanded="false" aria-controls="popupFaleConosco">
    
                    <div class="titulo-fale-conosco">
                        <h2 class="text-white">FALE CONOSCO</h2>
                        <p class="text-white-50">Nos mande sua dúvida.</p>
                    </div>
                    
                    <form action="tela_SUPORTE.php?mensagem=enviada" method="post" onsubmit="return verMensagem()">
                        <div class="form-group">
                            <label for="txtMensagem">Mensagem:</label>
                            <textarea class="form-control" id="txtMensagem" rows="8"></textarea>
                        </div>
    
                        <button type="submit" id="btnEnviarMens" class="btn-enviar btn btn-secondary btn-block btn-lg">ENVIAR</button>
                    </form>
                </div>


                <div class="collapse popup-faq" id="popupFaq" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                    <img src="img/btn_fechar.png" id="btnFecharFaq" class="btn-fechar" role="button" data-toggle="collapse" href="#popupFaq" aria-expanded="false" aria-controls="popupFaq">
    
                    <div class="titulo-faq">
                        <h2 class="text-white">FAQ</h2>
                        <p class="text-white-50">Veja as perguntas que mais recebemos.</p>
                    </div>

                    <div class="form-group">
                        <p><strong>Quais iniciativas específicas a Tripixel Studios está adotando para garantir que a
                             conscientização sobre acessibilidade vá além do jogo "The Blind Monk"?</strong></p>
                        <p>R.: Além de "The Blind Monk", a Tripixel Studios colabora com organizações, promove programas 
                            educacionais e adota práticas de design inclusivo. Estamos expandindo recursos acessíveis em 
                            nossos produtos e serviços, ampliando nossa missão de tornar o mundo mais acessível para todos.</p><br>

                        <p><strong>Como a Tripixel Studios está respondendo ao feedback da comunidade em relação à acessibilidade nos jogos?</strong></p>
                        <p>R.: A Tripixel Studios valoriza o feedback da comunidade sobre acessibilidade nos jogos e está 
                            comprometida em responder de forma proativa. A empresa busca implementar atualizações contínuas, 
                            abordando as necessidades e sugestões dos jogadores para melhorar a experiência de jogo inclusiva.</p><br>

                        <p><strong>A Tripixel Studios tem planos para expandir sua linha de jogos com foco em conscientização social?</strong></p>
                        <p>R.: Sim, a Tripixel Studios tem planos de expandir sua linha de jogos com foco em conscientização social, 
                            explorando novos projetos que abordam questões importantes além da acessibilidade.</p><br>
                    </div>

                    <button id="btnPronto" class="btn-pronto btn btn-secondary btn-block btn-lg" data-toggle="collapse" href="#popupFaq" aria-expanded="false" aria-controls="popupFaq">PRONTO</button>
                </div>
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