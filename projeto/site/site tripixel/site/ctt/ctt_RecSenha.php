<?php
    class CttRecSenha
    {
        private $sucesso;
        private $email;
        private $chave;

        public function __construct($email)
        {
            $this -> sucesso = false;

            require('site/adm/admin.php');
            require_once('site/ctt/phpmailer/class.phpmailer.php');

            $data_envio = date('d/m/Y');
            $hora_envio = date('H:i:s');

            $de = ADMIN;
            $de_nome = NOME;
            $this -> email = $email;
            $para = $this -> email;
            $assunto = 'Recuperação de Senha';
            $this -> chave = uniqid();
            $link = 'jogosobreacessibilidade.000webhostapp.com/site/TRIPIXEL%20SITE/index.php?chave-rec=' . $this -> chave;
            $corpo = '<html>
                        <body>
                            <div>
                                <p>Esta é uma mensagem enviada com o intuito de recuperar a senha da sua conta Tripixel.</p>
                                <p>Se você não solicitou a recuperação de sua senha, apenas ignore este e-mail.</p>
                                <p>Mas, se você realmente solicitou a recuperação de sua senha, clique no link abaixo para ser redirecionado à tela de recuperação:</p><br>
                            </div>

                            <div>
                                <a href="' . $link . '">REDEFINIR SUA SENHA</a>
                            </div>

                            <div>
                                <br><small> <strong>Obs.: O link irá expirar em 5 minutos.</strong> </small>
                            </div>
                        </body>
                      </html>';

            $this -> smtpmailer($para, $de, $de_nome, $assunto, $corpo);
        }

        function smtpmailer($para, $de, $de_nome, $assunto, $corpo)
        {
            global $erro;
            $mail = new PHPMailer();
            $mail -> IsSMTP();
            $mail -> SMTPDebug = 0;
            $mail -> SMTPAuth = true;
            $mail -> SMTPSecure = 'tls';
            $mail -> Host = 'smtp.office365.com';
            $mail -> Port = 587;
            $mail -> Username = ADMIN;
            $mail -> Password = SENHA;
            $mail -> CharSet = 'UTF-8';
            $mail -> IsHTML($corpo);
            $mail -> SetFrom($de, $de_nome);
            $mail -> Subject = $assunto;
            $mail -> Body = $corpo;
            $mail -> AddAddress($para);

            if($mail -> Send())
            {
                session_start();
                setcookie('recuperacao_senha', $this -> chave, time() + 300, '/');

                $_SESSION['chave'] = $this -> chave;
                $_SESSION['email'] = $this -> email;

                $this -> sucesso = true;
            }
            else
            {
                $this -> sucesso = false;
                
                $erroMail = 'Erro no PHPMailer: ' . $mail -> ErrorInfo;
                if(!empty($erroMail)) { echo($erroMail); }
            }
        }

        public function getSucesso() { return $this -> sucesso; }
        public function setSucesso($sucesso) { $this -> sucesso = $sucesso; }
    }
?>