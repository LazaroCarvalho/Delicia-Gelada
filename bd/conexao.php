<?php 
    
    function conexaoMysql()
    {
        // Conectando-se ao banco de dados.

        $server = (string) "localhost"; 
        $user = (string) "root";
        $password = (string) "bcd127";
        $database = (string) "contatos";
        
        $conexao = mysqli_connect($server, $user, $password, $database);

        return $conexao;
    }

?>