<?php 

    // Classe que chama as funções para interação com o banco de dados das Categorias.

    class CategoriaController {
        
        private $categoria;
        private $categoriaDAO;

        public function __construct ()
        {
            
            require_once('model/categoriaClass.php');
            require_once('model/DAO/categoriaDAO.php');

            $this->categoria = new Categoria();
            $this->categoriaDAO = new CategoriaDAO();

        }

        // Função que chama o método de inserir categorias no banco.
        public function inserirCategoria()
        {

            $this->categoria->setTitulo($_POST['titulo']);

            $insertCategoria = $this->categoriaDAO->insertCategoria($this->categoria);

            if($insertCategoria)
                echo("Inserido");
            else
                echo("falha ao inserir!");

        }

        // Chama função para atualizar uma categoria.
        public function atualizarCategoria()
        {

            $this->categoria->setId($_POST['id']);
            $this->categoria->setTitulo($_POST['titulo']);

            $updateCategoria = $this->categoriaDAO->updateCategoria($this->categoria);

            if($updateCategoria)
                echo("Inserido");
            else
                echo("falha ao inserir!");

        }

        // Função que deleta uma categoria.
        public function deletarCategoria()
        {

            $deleteCategoria = $this->categoriaDAO->deleteCategoria($_POST['id']);

            if($deleteCategoria)
                echo("Inserido");
            else
                echo("falha ao inserir!");

        }

        // Traz todas as categorias no banco.
        public function selecionarAllCategoria()
        {

            $categorias = $this->categoria->selectAllCategoria();

            if($categorias)
                return $categorias;
            else
                die();

        }

        // Traz uma categoria pelo seu ID
        public function selecionarById()
        {

            $categoria = $this->categoria->selectCategoriaById($_POST['id']);

            if($categorias)
                return $categorias;

        }

    }

?>