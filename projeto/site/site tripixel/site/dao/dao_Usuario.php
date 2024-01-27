<?php
    class DaoUsuario
    {
        private $sucesso;
        
        public function CadastroU($nomeU, $emailU, $senhaU, $fotoU)
        {
            $this -> sucesso = false;
            
            require('site/adm/admin.php');
            require('site/cnx/conexao.php');
    
            try
            {
                $cadastro = $conexao -> prepare("INSERT INTO tb_usuario(nome_usuario, email_usuario, senha_usuario, foto_usuario) VALUES
                                                 (?, ?, aes_encrypt(?, ?), ?);");
                
                $cadastro -> bindParam(1, $nomeU);
                $cadastro -> bindParam(2, $emailU);
                $cadastro -> bindParam(3, $senhaU);
                $cadastro -> bindValue(4, CHAVE);
                $cadastro -> bindParam(5, $fotoU);
                
                try
                {
                    if($cadastro -> execute())
                    {
                        if($cadastro -> rowCount() > 0)
                        {
                            $this -> sucesso = true;
                        }
                        else
                        {
                            $this -> sucesso = true;
                        }
                    }
                    else
                    {
                        $this -> sucesso = false;
                    }
                }
                catch(PDOException $erroExec)
                {
                    echo('Erro na Execução: ' . $erroExec -> getMessage());
                }
            }
            catch(PDOException $erroBanco)
            {
                echo('Erro no Banco: ' . $erroBanco -> getMessage());
            }
            
            $conexao = null;
        }


        public function LoginU($emailU, $senhaU)
        {
            $this -> sucesso = false;

            require('site/adm/admin.php');
            require('site/cnx/conexao.php');

            try
            {
                $login = $conexao -> prepare("SELECT * FROM tb_usuario WHERE email_usuario = ? AND
                                              aes_decrypt(senha_usuario, ?) = ?;");
                
                $login -> bindParam(1, $emailU);
                $login -> bindValue(2, CHAVE);
                $login -> bindParam(3, $senhaU);

                try
                {
                    if($login -> execute())
                    {
                        if($login -> rowCount() > 0)
                        {
                            while($registro = $login -> fetch(PDO::FETCH_OBJ))
                            {
                                $idULog = $registro -> id_usuario;
                                
                                session_start();
                                $_SESSION['nomeULog'] = $registro -> nome_usuario;
                                $_SESSION['emailULog'] = $registro -> email_usuario;
                                $_SESSION['senhaULog'] = $senhaU;
                                $_SESSION['fotoULog'] = $registro -> foto_usuario;

                                setcookie('login_usuario', $idULog, time() + 7200, '/');

                                $this -> sucesso = true;
                            }
                        }
                        else
                        {
                            $this -> sucesso = false;
                        }
                    }
                    else
                    {
                        $this -> sucesso = false;
                    }
                }
                catch(PDOException $erroExec)
                {
                    echo('Erro na Execução: ' . $erroExec -> getMessage());
                }
            }
            catch(PDOException $erroBanco)
            {
                echo('Erro no Banco: ' . $erroBanco -> getMessage());
            }

            $conexao = null;
        }


        public function RecSenhaU($formaRecuperacao, $situacao)
        {
            $this -> sucesso = false;

            require('site/cnx/conexao.php');

            try
            {
                if($situacao == 'nome')
                {
                    $recuperacao = $conexao -> prepare("SELECT email_usuario FROM tb_usuario WHERE nome_usuario = ?;");
                }
                else if($situacao == 'email')
                {
                    $recuperacao = $conexao -> prepare("SELECT * FROM tb_usuario WHERE email_usuario = ?;");
                }
                
                $recuperacao -> bindParam(1, $formaRecuperacao);
    
                try
                {
                    if($recuperacao -> execute())
                    {
                        if($recuperacao -> rowCount() > 0)
                        {
                            if($situacao == 'nome')
                            {
                                while($registro = $recuperacao -> fetch(PDO::FETCH_OBJ))
                                {
                                    $email_de_recuperacao = $registro -> email_usuario;
                                    $this -> sucesso = true;
        
                                    return $email_de_recuperacao;
                                }
                            }
                            else if($situacao == 'email')
                            {
                                $email_de_recuperacao = $formaRecuperacao;
                                $this -> sucesso = true;
        
                                return $email_de_recuperacao;
                            }
                        }
                    }
                }
                catch(PDOException $erroExec)
                {
                    echo('Erro na Execução: ' . $erroExec -> getMessage());
                }
            }
            catch(PDOException $erroBanco)
            {
                echo('Erro no Banco: ' . $erroBanco -> getMessage());
            }

            $conexao = null;
        }


        public function getSucesso() { return $this -> sucesso; }
        public function setSucesso($sucesso) { $this -> sucesso = $sucesso; }
    }
?>