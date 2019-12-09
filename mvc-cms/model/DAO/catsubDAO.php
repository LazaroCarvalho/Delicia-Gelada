<?php 

    class CatSubDAO {

        private $conexao;

        public function __construct()
        {

            require_once('model/DAO/conexaoMysql.php');
            require_once('model/DAO/catsubClass.php');

            $this->conexao = connectDatabase();

        }

        // Insere uma subcat no banco.
        public function insertCatSub(CatSub $catSub)
        {

            $sql = "INSERT INTO catsub (idcategoria, idsubcategoria) VALUES (?, ?)";

            $statement = $this->conexao->prepare($sql);

            // Dados que serão inseridos pelo insert.
            $statementDados = array(
                $idCategoria = $catSub->getIdCategoria(),
                $idSubCategoria = $catSub->getIdSubCategoria()
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

        // Seleciona um registro através de seu id.
        public function selectSubCatById($id)
        {
            
            $sql = "SELECT * FROM subcat WHERE id = ".$id;
            $select = $this->conexao->query($sql);

            if($rsSubCat = $select->fetch(PDO::FETCH_ASSOC))
            {

                // Preenchendo um objeto categoria com os dados do registro do banco.
                $subCat = new SubCat();
                $subCat->setId($rsSubCat['id']);
                $subCat->setTitulo($rsSubCat['titulo']);

                return $subCat;

            } 
            else {
                return false;
            }

        }

    }

?>