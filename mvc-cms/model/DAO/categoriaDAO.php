<?php 

    /* Classe responsável por fazer interações com o banco de dados
     * A respeito da entidade Categorias
     */

    class CategoriaDAO {

        private $conexaoBanco;

        public function __construct()
        {

            require_once('conexaoMysql.php');
            require_once('model/categoriaClass.php')

            $conexao = new ConexaoMysql();

            $this->conexaoBanco = $conexao->connectDatabase();

        }

        // Insere uma categoria no banco.
        public function insertCategoria(Categoria $categoria)
        {

            $sql = "INSERT INTO categorias (titulo) VALUES (?)";

            $statement = $this->conexaoBanco->prepare($sql);

            // Dados que serão inseridos pelo insert.
            $statementDados = array(
                $tituloCategoria = $categoria->getTitulo()
            );

            // Executando o insert no banco.
            if($statement->execute($statementDados))
            {
                return true;
            }
            else {
                return false;
            }

        }

        // Função para atualizar uma categoria.
        public function updateCategoria(Categoria $categoria)
        {

            $sql = "UPDATE categorias SET titulo = ? WHERE id = ?";

            $statement = $this->conexaoBanco->prepare($sql);

            // Dados que serão inseridos no registro.
            $statementDados = array(
                $tituloCategoria = $categoria->getTitulo(),
                $idCategoria = $categoria->getId()
            );

            // Executando update no banco.
            if($statement->execute($statementDados))
            {
                return true;
            }
            else {
                return false;
            }

        }

        // Deleta um registro no cujo id corresponde ao parâmetro recebido.
        public function deleteCategoria($id)
        {

            $sql = "DELETE FROM categorias WHERE id = ".$id;

            if($this->conexaoBanco->query($sql))
                return true;
            else
                return false;

        }

        // Busca todas as categorias registradas no banco.
        public function selectAllCategoria()
        {

            $sql = "SELECT * FROM categorias";

            $statement = $this->conexaoBanco->query($sql);

            // Cria array contendo todas as categorias e seus respectivos dados.
            $contador = 0;
            while($rsCategoria = $statement->fetch(PDO::FETCH_ASSOC))
            {

                $categoria[] = new Categoria();

                $categoria[$contador]->setId($rsCategoria['id']);
                $categoria[$contador]->setTitulo($rsCategoria['titulo']);

                $contador++;
                
            }

            // Se houver no mínimo uma categoria, retorna-a. Do contrário, retorna falso.
            if($categoria)
                return $categoria;
            else
                return false;

        }

        // Seleciona um registro através de seu id.
        public function selectCategoriaById($id)
        {
            
            $sql = "SELECT * FROM categorias WHERE id = ".$id;
            $select = $this->conexaoBanco->query($sql);

            if($rsCategoria = $select->fetch(PDO::FETCH_ASSOC))
            {

                // Preenchendo um objeto categoria com os dados do registro do banco.
                $categoria = new Categoria();
                $categoria->setId($rsCategoria['id']);
                $categoria->setTitulo($rsCategoria['titulo']);

                return $categoria;

            } 
            else {
                return false;
            }

        }

    }

?>