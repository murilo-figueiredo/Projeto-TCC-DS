<?php
    class Upload
    {
        private $input;
        private $nomeFoto;
        private $tmpNomeFoto;
        private $destino = 'site/upl/uploads/';
        private $default = 'sem_foto_perfil.png';

        public function __construct($input, $nomeFoto, $tmpNomeFoto)
        {
            $this -> input = $input;
            $this -> nomeFoto = $nomeFoto;
            $this -> tmpNomeFoto = $tmpNomeFoto;

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(empty($input['name']))
                {
                    $this -> nomeFoto = $this -> default;
                }
                else if(isset($input) && $input['error'] == UPLOAD_ERR_OK)
                {
                    $this -> destino = $this -> destino . '' . $this -> nomeFoto;

                    move_uploaded_file($this -> tmpNomeFoto, $this -> destino);
                }
            }
            
        }

        public function getFoto() { return $this -> nomeFoto; }
        public function setFoto($nomeFoto) { $this -> nomeFoto = $nomeFoto; }
    }
?>