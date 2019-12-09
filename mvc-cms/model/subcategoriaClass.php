<?php 

    /* Classe que representa a entidade de Categoria no projeto */

    class SubCategoria {
        
        private $id;
        private $titulo;

        // construtor
        public function __construct()
        {

        }

        // Getters e Setters
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function gettitulo()
        {
            return $this->titulo;
        }

        public function settitulo($titulo)
        {
            $this->titulo = $titulo;
        }

    }

?>