<?php
    if(isset($_REQUEST['cadastro']) && ($_REQUEST['cadastro'] == 'solicitado'))
    {
        $nome_usuario = $_POST['nome_usuario'];
        $email_usuario = $_POST['email_usuario'];
        $senha_usuario = $_POST['senha_usuario'];
        $upload_foto = $_FILES["foto_usuario"];

        require('site/upl/upload.php');
        $upload = new Upload($upload_foto, $upload_foto['name'], $upload_foto['tmp_name']);
        $foto_usuario = $upload -> getFoto();

        require('site/ent/ent_Usuario.php');
        require('site/dao/dao_Usuario.php');

        $entUsuario = new EntUsuario($nome_usuario, $email_usuario, $senha_usuario, $foto_usuario);
        $daoUsuario = new DaoUsuario();
        
        $daoUsuario -> CadastroU($entUsuario -> getNomeU(), $entUsuario -> getEmailU(),
                                    $entUsuario -> getSenhaU(), $entUsuario -> getFotoU());
        if($daoUsuario -> getSucesso())
        {
            $daoUsuario -> setSucesso(false);

            echo('<script>alert(\'Seu cadastro foi realizado com sucesso!!\');</script>');
            echo('<meta http-equiv="refresh" content="0 URL=index.php">');
        }
        else
        {
            echo('<script>alert(\'Ocorreu um erro ao tentar criar sua conta. Tente novamente.\');</script>');
            echo('<meta http-equiv="refresh" content="0 URL=index.php">');
        }
    }


    if(isset($_REQUEST['login']) && ($_REQUEST['login'] == 'solicitado'))
    {
        $email_login = $_POST['email_login'];
        $senha_login = $_POST['senha_login'];

        require('site/ent/ent_Usuario.php');
        require('site/dao/dao_Usuario.php');

        $entUsuario = new EntUsuario('', $email_login, $senha_login, '');
        $daoUsuario = new DaoUsuario();
        
        $daoUsuario -> LoginU($entUsuario -> getEmailU(), $entUsuario -> getSenhaU());
        if($daoUsuario -> getSucesso())
        {
            $daoUsuario -> setSucesso(false);

            echo('<script>alert(\'Você entrou em sua conta!!\');</script>');
            echo('<meta http-equiv="refresh" content="0 URL=index.php">');
        }
        else
        {
            echo('<script>alert(\'Sua conta não foi encontrada. Verifique os dados inseridos.\');</script>');
            echo('<meta http-equiv="refresh" content="0 URL=index.php">');
        }
    }


    if(isset($_REQUEST['recuperacao']) && ($_REQUEST['recuperacao'] == 'solicitada'))
    {
        $opcoes_esq_senha = $_POST['opcoes_esq_senha'];
        $nome_esq_senha = '';
        $email_esq_senha = '';
        $email_de_recuperacao = '';
        
        require('site/ent/ent_Usuario.php');
        require('site/dao/dao_Usuario.php');
        require('site/ctt/ctt_RecSenha.php');
        
        $daoUsuario = new DaoUsuario();

        if($opcoes_esq_senha == 'opcaoNome')
        {
            $nome_esq_senha = $_POST['nome_esq_senha'];
            
            $entUsuario = new EntUsuario($nome_esq_senha, $email_esq_senha, '', '');

            $email_de_recuperacao = $daoUsuario -> RecSenhaU($entUsuario -> getNomeU(), 'nome');

            if($daoUsuario -> getSucesso())
            {
                $daoUsuario -> setSucesso(false);

                list($parteLocal, $dominio) = explode('@', $email_de_recuperacao);
                $maskLocal = substr($parteLocal, 0, 3);
                for($i = 3; $i < strlen($parteLocal) - 3; $i++) { $maskLocal .= '*'; }
                $maskLocal .= substr($parteLocal, -3);
                $email_mascarado = ($maskLocal . '@' . $dominio);

                $cttRecSenha = new CttRecSenha($email_de_recuperacao);
                if($cttRecSenha -> getSucesso())
                {
                    $cttRecSenha -> setSucesso(false);

                    echo('<script>alert(\'Um e-mail de confirmação foi enviado para ' . $email_mascarado . '. Verifique sua caixa de entrada e sua caixa de spam.\');</script>');
                    echo('<meta http-equiv="refresh" content="0 URL=index.php">');
                }
                else
                {
                    echo('<script>alert(\'Ocorreu um erro ao tentar enviar o e-mail de confirmação. Tente novamente mais tarde.\');</script>');
                    echo('<meta http-equiv="refresh" content="0 URL=index.php">');
                }
            }
            else
            {
                echo('<script>alert(\'Não foi possível encontrar o nome. Você também pode tentar usar seu e-mail.\');</script>');
                echo('<meta http-equiv="refresh" content="0 URL=index.php">');
            }
        }
        else if($opcoes_esq_senha == 'opcaoEmail')
        {
            $email_esq_senha = $_POST['email_esq_senha'];

            $entUsuario = new EntUsuario($nome_esq_senha, $email_esq_senha, '', '');

            $email_de_recuperacao = $daoUsuario -> RecSenhaU($entUsuario -> getEmailU(), 'email');

            if($daoUsuario -> getSucesso())
            {
                $daoUsuario -> setSucesso(false);
                
                $cttRecSenha = new CttRecSenha($email_de_recuperacao);
                if($cttRecSenha -> getSucesso())
                {
                    $cttRecSenha -> setSucesso(false);

                    echo('<script>alert(\'Um e-mail de confirmação foi enviado para o seu endereço de e-mail. Verifique sua caixa de entrada.\');</script>');
                    echo('<meta http-equiv="refresh" content="0 URL=index.php">');
                }
                else
                {
                    echo('<script>alert(\'Ocorreu um erro ao tentar enviar o e-mail de confirmação. Tente novamente mais tarde.\');</script>');
                    echo('<meta http-equiv="refresh" content="0 URL=index.php">');
                }
            }
            else
            {
                echo('<script>alert(\'Não foi possível encontrar o e-mail. Você também pode tentar usar seu nome de usuário.\');</script>');
                echo('<meta http-equiv="refresh" content="0 URL=index.php">');
            }
        }
    }


    if(isset($_REQUEST['saida']) && ($_REQUEST['saida'] == 'solicitada'))
    {
        session_start();
        session_destroy();

        try
        {
            setcookie('login_usuario', '', time() - 3600, '/');

            echo('<script>alert(\'Você saiu de sua conta. Volte sempre!!\');</script>');
            echo('<meta http-equiv="refresh" content="0 URL=index.php">');
        }
        catch(Exception $erro)
        {
            echo('Erro ao Sair: ' . $erro -> getMessage());
        }
    }


    if(isset($_REQUEST['tela']) && ($_REQUEST['tela'] == 'solicitada'))
    {
        if($_POST['btn_jogos'] == 'jogos')
        {
            header('location:site/tela_Jogos.php');
        }
        if($_POST['btn_quem_somos'] == 'quem_somos')
        {
            header('location:site/tela_QuemSomos.php');
        }
        if($_POST['btn_informacoes'] == 'informacoes')
        {
            header('location:site/tela_Informacoes.php');
        }
        if($_POST['btn_suporte'] == 'suporte')
        {
            header('location:site/tela_Suporte.php');
        }
    }
?>