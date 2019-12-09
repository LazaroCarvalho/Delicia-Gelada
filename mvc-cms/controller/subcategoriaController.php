<?php 

    // Classe que chama as funções para interação com o banco de dados das SubCategorias.

    class SubCategoriaController {
        
        private $subCategoria;
        private $subCategoriaDAO;

        public function __construct ()
        {
            
            require_once('model/subCategoriaClass.php');
            require_once('model/DAO/subCategoriaDAO.php');

            $this->subCategoria = new SubCategoria();
            $this->subCategoriaDAO = new SubCategoriaDAO();

        }

        // Função que chama o método de inserir subCategorias no banco.
        public function inserirSubCategoria()
        {

            $this->subCategoria->setTitulo("arroz");

            $insertSubCategoria = $this->subCategoriaDAO->insertSubCategoria($this->subCategoria);

            if($insertSubCategoria)
                return $insertSubCategoria;
            else
                echo("falha ao inserir!");

        }

        // Chama função para atualizar uma subCategoria.
        public function atualizarSubCategoria()
        {

            $this->subCategoria->setId($_POST['id']);
            $this->subCategoria->setTitulo($_POST['titulo']);

            $updateSubCategoria = $this->subCategoriaDAO->updateSubCategoria($this->subCategoria);

            if($updateSubCategoria)
                echo("Inserido");
            else
                echo("falha ao inserir!");

        }

        // Função que deleta uma subCategoria.
        public function deletarSubCategoria()
        {

            $deleteSubCategoria = $this->subCategoriaDAO->deleteSubCategoria($_POST['id']);

            if($deleteSubCategoria)
                echo("Inserido");
            else
                echo("falha ao inserir!");

        }

        // Traz todas as subCategorias no banco.
        public function selecionarAllSubCategoria()
        {

            $subCategorias = $this->subCategoria->selectAllSubCategoria();

            if($subCategorias)
                return $subCategorias;
            else
                die();

        }

        // Traz uma subCategoria pelo seu ID
        public function selecionarById()
        {

            $subCategoria = $this->subCategoria->selectSubCategoriaById($_POST['id']);

            if($subCategorias)
                return $subCategorias;

        }

    }

?>