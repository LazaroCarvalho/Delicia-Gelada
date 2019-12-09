<?php 

    /* Classe responsável por fazer interações com o banco de dados
     * A respeito da entidade SubCategorias
     */

    class SubCategoriaDAO {

        private $conexaoBanco;

        public function __construct()
        {

            require_once('conexaoMysql.php');
            require_once('model/subcategoriaClass.php');

            $conexao = new ConexaoMysql();

            $this->conexaoBanco = $conexao->connectDatabase();

        }

        // Insere uma subcategoria no banco.
        public function insertSubCategoria(SubCategoria $subCategoria)
        {

            $sql = "INSERT INTO subcategorias (titulo) VALUES (?)";

            $statement = $this->conexaoBanco->prepare($sql);

            // Dados que serão inseridos pelo insert.
            $statementDados = array(
                $tituloSubCategoria = $subCategoria->getTitulo()
            );

            // Executando o insert no banco.
            if($statement->execute($statementDados))
            {   
                // Retornando o ID da subcategoria inserida.
                return $this->conexaoBanco->lastInsertId();
            }
            else {
                return false;
            }

        }

        // Função para atualizar uma subsubcategoria.
        public function updateSubCategoria(SubCategoria $subCategoria)
        {

            $sql = "UPDATE subsubcategorias SET titulo = ? WHERE id = ?";

            $statement = $this->conexaoBanco->prepare($sql);

            // Dados que serão inseridos no registro.
            $statementDados = array(
                $tituloSubCategoria = $subCategoria->getTitulo(),
                $idSubCategoria = $subCategoria->getId()
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
        public function deleteSubCategoria($id)
        {

            $sql = "DELETE FROM subcategorias WHERE id = ".$id;

            if($this->conexaoBanco->query($sql))
                return true;
            else
                return false;

        }

        // Busca todas as subcategorias registradas no banco.
        public function selectAllSubCategoria()
        {

            $sql = "SELECT * FROM subcategorias";

            $statement = $this->conexaoBanco->query($sql);

            // Cria array contendo todas as subcategorias e seus respectivos dados.
            $contador = 0;
            while($rsSubCategoria = $statement->fetch(PDO::FETCH_ASSOC))
            {

                $subCategoria[] = new SubCategoria();

                $subCategoria[$contador]->setId($rsSubCategoria['id']);
                $subCategoria[$contador]->setTitulo($rsSubCategoria['titulo']);

                $contador++;
                
            }

            // Se houver no mínimo uma subcategoria, retorna-a. Do contrário, retorna falso.
            if($subCategoria)
                return $subCategoria;
            else
                return false;

        }

        // Seleciona um registro através de seu id.
        public function selectSubCategoriaById($id)
        {
            
            $sql = "SELECT * FROM subcategorias WHERE id = ".$id;
            $select = $this->conexaoBanco->query($sql);

            if($rsSubCategoria = $select->fetch(PDO::FETCH_ASSOC))
            {

                // Preenchendo um objeto subcategoria com os dados do registro do banco.
                $subCategoria = new SubCategoria();
                $subCategoria->setId($rsSubCategoria['id']);
                $subCategoria->setTitulo($rsSubCategoria['titulo']);

                return $subCategoria;

            } 
            else {
                return false;
            }

        }

    }

?>