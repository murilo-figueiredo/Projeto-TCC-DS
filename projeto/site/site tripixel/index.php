<!DOCTYPE html>
<html>
    <html lang="pt-br">
    <head>
        <title>TRIPIXEL STUDIOS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="site/img/logos/ícones/favicon_branco.ico" type="image/x-icon">

        <link rel="stylesheet" href="site/css/estilos_HOME.css">
        <script src="site/js/rotinas_HOME.js" defer></script>
        <script src="site/js/rotinas_HOME_logado.js" defer></script>
        <script src="site/js/ver/verificadores.js" defer></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body style="margin: 0; background-image: url('site/img/foto_fundo_1.png'); background-repeat: no-repeat; background-size: cover; background-position: center; backdrop-filter: blur(3px);">
        <?php
            if(isset($_COOKIE['login_usuario']))
            {
                session_start();
                $nomeULog = $_SESSION['nomeULog'];
                $emailULog = $_SESSION['emailULog'];
                $senhaULog = $_SESSION['senhaULog'];
                $fotoULog = $_SESSION['fotoULog'];
        ?>
                <div class="logo">
                    <img src="site/img/logos/LOGO_FUNDO_ROXO.png">
                </div>

                <div class="corpo">
                    <div class="container-logado">
                        <div class="conta">
                            <div class="conta-conteudo">
                                <form action="tela_HOME.php?saida=solicitada" method="post">
                                    <div class="form-group visualizacao-logado">
                                        <img src="site/upl/uploads/<?php echo($fotoULog) ?>" class="img-visualizacao-logado"><br><br>
                                    </div>
                                    
                                    <div class="titulo-logado">
                                        <h2 class="text-white"><?php echo("Olá $nomeULog!") ?></h2>
                                        <p class="text-white-50">O que você deseja fazer?</p>
                                    </div>
                                    
                                    <ul class="opcoes-logado">
                                        <li id="btnAbrirInfo" class="opcoes-alternativas-logado text-info" data-toggle="collapse" href="#popupInfoConta" role="button" aria-expanded="false" aria-controls="popupInfoConta">Ver informações da conta</li>
                                        <li>•</li>
                                        <li class="opcoes-alternativas-logado text-info"><button type="submit" id="btnSair" class="btn-sair">Sair da conta</button></li>
                                    </ul>
                                </form>
                            </div>
                        </div>

                        <div class="telas">
                            <div class="telas-conteudo">
                                <div class="titulo-telas">
                                    <h2 class="text-white">TELAS</h2>
                                    <p class="text-white-50">Agora já logado, você pode acessar essas telas:</p>
                                </div>

                                <form action="tela_HOME.php?tela=solicitada" method="post">
                                    <div class="container-telas">
                                        <button type="submit" name="btn_jogos" class="btn btn-block btn-secondary btn-lg" value="jogos"><img src="site/img/icone_jogos.png" width="40px" height="40px">JOGOS</button>
                                        <button type="submit" name="btn_quem_somos" class="btn btn-block btn-secondary btn-lg" value="quem_somos"><img src="site/img/icone_quem_somos.png" width="40px" height="40px">QUEM SOMOS</button>
                                        <button type="submit" name="btn_informacoes" class="btn btn-block btn-secondary btn-lg" value="informacoes"><img src="site/img/icone_informacoes.png" width="40px" height="40px">INFORMAÇÕES</button>
                                        <button type="submit" name="btn_suporte" class="btn btn-block btn-secondary btn-lg" value="suporte"><img src="site/img/icone_suporte.png" width="40px" height="40px">SUPORTE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="sobreposicao-logado"></div>
                    
                    <div class="collapse popup-info-conta" id="popupInfoConta" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                        <img src="site/img/btn_fechar.png" id="btnFecharInfo" class="btn-fechar" role="button" data-toggle="collapse" href="#popupInfoConta" aria-expanded="false" aria-controls="popupInfoConta">
    
                        <div class="titulo-info-conta">
                            <h2 class="text-white">SUAS INFORMAÇÕES</h2>
                            <p class="text-white-50">Aqui estão as informações pessoais da sua conta.</p>
                        </div>

                        <div class="popup-info-conta-conteudo">
                            <div class="form-group">
                                <label>Nome de Usuário: <?php echo($nomeULog); ?></label>
                            </div>

                            <div class="form-group">
                                <label>E-mail: <?php echo($emailULog); ?></label>
                            </div>

                            <div class="form-group">
                                <label id="lblInfoSenha">Senha: <?php
                                    for($i = 1; $i <= strlen($senhaULog); $i++)
                                    {
                                        echo('*');
                                    }
                                ?></label>
                            </div>

                            <button id="btnPronto" class="btn btn-secondary btn-lg btn-block btn-pronto" data-toggle="collapse" href="#popupInfoConta" aria-expanded="false" aria-controls="popupInfoConta">PRONTO</button>
                        </div>
                    </div>
                </div>
        <?php
            }
            else
            {
        ?>
                <div class="logo">
                    <img src="site/img/logos/LOGO_FUNDO_ROXO.png">
                </div>

                <div class="corpo">
                    <div class="container">
                        <div class="conta">
                            <div class="conta-conteudo">
                                <div class="titulo-login">
                                    <h2 class="text-white">LOGIN</h2>
                                    <p class="text-white-50">Faça login para acessar o site.</p>
                                </div>
                            
                                <form action="tela_HOME.php?login=solicitado" method="post" class="form-login" onsubmit="return verLogin()">
                                    <div class="form-group">
                                        <label for="txtEmailLog">E-mail:</label>
                                        <input type="email" class="form-control" id="txtEmailLog" name="email_login" placeholder="Seu e-mail" maxlength="80" oninput="verEmail('login')">
                                        <small id="avisoEmailLog" class="form-text text-danger">O e-mail digitado não é válido.</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="txtSenhaLog">Senha:</label>
                                        <input type="password" class="form-control" id="txtSenhaLog" name="senha_login" maxlength="20" placeholder="Sua senha">
                                    </div>

                                    <button type="submit" class="btn btn-secondary btn-lg btn-block btn-logar" id="btnLogar" name="btn_logar">ENVIAR</button>
                                </form>

                                <ul class="opcoes-login">
                                    <li id="btnAbrirEsqSen" class="opcoes-alternativas text-info" data-toggle="collapse" href="#popupEsqSen" role="button" aria-expanded="false" aria-controls="popupEsqSen">Esqueceu sua senha?</li>
                                    <li>•</li>
                                    <li id="btnAbrirCad" class="opcoes-alternativas text-info" data-toggle="collapse" href="#popupCadastro" role="button" aria-expanded="false" aria-controls="popupCadastro">Não possui uma conta?</li>
                                </ul>
                            </div>
                        </div>

                        <div class="telas">
                            <div class="telas-conteudo">
                                <div class="titulo-telas">
                                    <h2 class="text-white">TELAS</h2>
                                    <p class="text-white-50">Ao fazer login, você ganha acesso às seguintes telas:</p>
                                </div>

                                <div class="container-telas">
                                    <button type="button" class="btn btn-block btn-secondary btn-lg" disabled><img src="site/img/icone_jogos.png" width="40px" height="40px">JOGOS</button>
                                    <button type="button" class="btn btn-block btn-secondary btn-lg" disabled><img src="site/img/icone_quem_somos.png" width="40px" height="40px">QUEM SOMOS</button>
                                    <button type="button" class="btn btn-block btn-secondary btn-lg" disabled><img src="site/img/icone_informacoes.png" width="40px" height="40px">INFORMAÇÕES</button>
                                    <button type="button" class="btn btn-block btn-secondary btn-lg" disabled><img src="site/img/icone_suporte.png" width="40px" height="40px">SUPORTE</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sobreposicao"></div>
                    
                    <div class="collapse popup-cadastro" id="popupCadastro" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                        <img src="site/img/btn_fechar.png" id="btnFecharCad" class="btn-fechar" role="button" data-toggle="collapse" href="#popupCadastro" aria-expanded="false" aria-controls="popupCadastro">
    
                        <div class="titulo-cadastro">
                            <h2 class="text-white">CADASTRO</h2>
                            <p class="text-white-50">Insira suas informações para criar uma conta.</p>
                        </div>

                        <div class="popup-cadastro-conteudo">
                            <form action="tela_HOME.php?cadastro=solicitado" method="post" class="form-cadastro" id="frmCadastro" enctype="multipart/form-data" onsubmit="return verCadastro()">
                                <div class="form-group">
                                    <label for="txtNomeCad">Nome de Usuário <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Campo obrigatório!">*</span>:</label>
                                    <input type="text" id="txtNomeCad" name="nome_usuario" maxlength="30" class="form-control cadastro" placeholder="Digite o nome pelo qual você será chamado em nosso site">
                                </div>

                                <div class="form-group">
                                    <label for="txtEmailCad">E-mail <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Campo obrigatório!">*</span>:</label>
                                    <input type="email" id="txtEmailCad" name="email_usuario" maxlength="80" class="form-control cadastro" oninput="verEmail('cadastro')" placeholder="Digite seu endereço de e-mail">
                                    <small class="form-text text-danger" id="avisoEmailCad">O e-mail digitado não é válido!</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtSenhaCad">Senha (5 a 20 caracteres) <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Campo obrigatório!">*</span>:</label>
                                    <input type="password" id="txtSenhaCad" name="senha_usuario" maxlength="20" class="form-control cadastro" oninput="verSenha('cadastro')" placeholder="Digite sua senha">
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtConfSenhaCad">Confirmar Senha <span class="text-danger" data-toggle="tooltip" data-placement="right" title="Campo obrigatório!">*</span>:</label>
                                    <input type="password" id="txtConfSenhaCad" maxlength="20" class="form-control cadastro" oninput="verSenha('cadastro')" placeholder="Reescreva sua senha">
                                    <small class="form-text text-danger" id="avisoSenhaCad"></small>
                                </div>

                                <div class="row">
                                    <div class="col custom-file form-group">
                                        <input type="file" id="txtFoto" name="foto_usuario" class="custom-file-input cadastro" accept="image/*">
                                        <label for="txtFoto" class="custom-file-label lbl-foto" id="lblFoto">Escolha sua foto de perfil</label>
                                        <small id="btnRemFoto" class="form-text text-info btn-remover-foto">Remover Foto</small>
                                    </div>

                                    <div class="col visualizacao">
                                        <img src="site/upl/uploads/sem_foto_perfil.png" id="imgVisualizacao" class="img-visualizacao">
                                    </div>
                                </div>

                                <button type="submit" id="btnCadastrar" class="btn btn-secondary btn-lg btn-block btn-enviar-cad">ENVIAR</button>
                            </form>
                        </div>
                    </div>
                    

                    <div class="collapse popup-esq-senha" id="popupEsqSen" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                        <img src="site/img/btn_fechar.png" id="btnFecharEsqSen" class="btn-fechar" role="button" data-toggle="collapse" href="#popupEsqSen" aria-expanded="false" aria-controls="popupEsqSen">
    
                        <div class="titulo-esq-sen">
                            <h2 class="text-white">RECUPERAÇÃO DE SENHA</h2>
                            <p class="text-white-50">Insira o que se pede para recuperar sua senha.</p>
                        </div>

                        <div class="popup-esq-senha-conteudo">
                            <form action="tela_HOME.php?recuperacao=solicitada" method="post" class="form-esq-sen" id="frmEsqSen" onsubmit="return verEsqueceuSenha()">
                                <div class="form-group">
                                    <label for="">Selecione como você quer recuperar sua senha:</label>
                                    <div class="form-check rd-esq-sen">
                                        <input type="radio" class="form-check-input" name="opcoes_esq_senha" id="opcaoNome" value="opcaoNome" checked>
                                        <label for="opcaoNome" class="form-check-label">Nome de Usuário</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="opcoes_esq_senha" id="opcaoEmail" value="opcaoEmail">
                                        <label for="opcaoEmail" class="form-check-label">E-mail</label>
                                    </div>
                                </div>

                                <div class="form-group" id="nomeEsqSenha">
                                    <label for="txtNomeEsqSen">Nome de Usuário:</label>
                                    <input type="text" id="txtNomeEsqSen" name="nome_esq_senha" maxlength="30" class="form-control esq-senha" placeholder="Digite seu nome de usuário">
                                </div>

                                <div class="form-group" id="emailEsqSenha" style="display: none;">
                                    <label for="txtEmailEsqSen">E-mail:</label>
                                    <input type="email" id="txtEmailEsqSen" name="email_esq_senha" maxlength="80" class="form-control esq-senha" oninput="verEmail('esqueceu senha')" placeholder="Digite seu endereço de e-mail">
                                    <small class="form-text text-danger" id="avisoEmailEsqSen">O e-mail digitado não é válido!</small>
                                </div>

                                <button type="submit" id="btnEsqSen" class="btn btn-secondary btn-lg btn-block btn-enviar-esq-senha">ENVIAR</button>
                            </form>
                        </div>
                    </div>
                </div>
        <?php
                /*
                if(isset($_GET['chave-rec']))
                {
                    if(isset($_COOKIE['recuperacao_senha']))
                    {
                        session_start();
                
                        $chave = $_GET['chave-rec'];
                        $chaveGerada = $_SESSION['chave'];
                        $email = $_SESSION['email'];

                        if($chave === $chaveGerada)
                        {
        ?>
                            <div class="collapse show popup-alter-senha" id="popupAlterSen" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                                <div class="titulo-alter-sen">
                                    <h2 class="text-white">ALTERAÇÃO DE SENHA</h2>
                                    <p class="text-white-50">Crie uma nova senha para sua conta.</p>
                                </div>

                                <div class="popup-alter-senha-conteudo">
                                    <form action="tela_HOME.php?alteracao=solicitada" method="post" class="form-alter-sen" id="frmAlterSen" onsubmit="return verAlterarSenha()">
                                        <div class="form-group">
                                            <label for="txtSenhaAlter">Nova Senha (5 a 20 caracteres):</label>
                                            <input type="password" id="txtSenhaAlter" name="senha_alter" maxlength="20" class="form-control alteracao" oninput="verSenha('alteracao de senha')" placeholder="Digite sua nova senha">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="txtConfSenhaAlter">Confirmar Nova Senha:</label>
                                            <input type="password" id="txtConfSenhaAlter" maxlength="20" class="form-control alteracao" oninput="verSenha('alteracao de senha')" placeholder="Reescreva sua nova senha">
                                            <small class="form-text text-danger" id="avisoSenhaAlter"></small>
                                        </div>

                                        <button type="submit" id="btnAlterSen" class="btn btn-secondary btn-lg btn-block btn-enviar-alter-senha">ENVIAR</button>
                                    </form>
                                </div>
                            </div>
        <?php
                        }
                    }
                    else
                    {
                        session_start();
                        session_destroy();

                        echo('<script>alert(\'O link de recuperação expirou. Tente novamente.\');</script>');
                        echo('<meta http-equiv="refresh" content="0 URL=index.php">');
                    }
                }
                */
            }
        ?>
    </body>
</html>
