<?php
    class EntUsuario
    {
        private $nomeU;
        private $emailU;
        private $senhaU;
        private $fotoU;

        public function __construct($nomeU, $emailU, $senhaU, $fotoU)
        {
            $this -> nomeU = $nomeU;
            $this -> emailU = $emailU;
            $this -> senhaU = $senhaU;
            $this -> fotoU = $fotoU;
        }

        public function getNomeU() { return $this -> nomeU; }
        public function setNomeU($nomeU) { $this -> nomeU = $nomeU; }

        public function getEmailU() { return $this -> emailU; }
        public function setEmailU($emailU) { $this -> emailU = $emailU; }

        public function getSenhaU() { return $this -> senhaU; }
        public function setSenhaU($senhaU) { $this -> senhaU = $senhaU; }

        public function getFotoU() { return $this -> fotoU; }
        public function setFotoU($fotoU) { $this -> fotoU = $fotoU; }
    }
?>