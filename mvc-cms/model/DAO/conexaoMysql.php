<?php 

    /* Esta classe é responsável por realizar a conexão com o banco de dados */

    class ConexaoMysql {

        private $host;
        private $user;
        private $password;
        private $database;

        // Construtor
        public function __construct()
        {

            $this->host = "localhost";
            $this->user = "root";
            $this->password = "bcd127";
            $this->database = "contatos";

        }

        // Conecta com o banco de dados e retorna um objeto da conexão.
        public function connectDatabase()
        {
            
            try{

                $conexao = new PDO('mysql:host='.$this->host.';dbname='.$this->database,
                                    $this->user, $this->password);

                return $conexao;

            } 
            catch(PDOException $erro) 
            {   // Lança uma exception caso a conexão dê errado.
                
                echo("Erro ao realizar conexão com o banco.
                    <br>
                    Erro: ".$erro->getMessage().
                    "<br>
                    Linha: ".$erro->getLine());

            }

        }

    }

?>