<?php 

    /* Realizando a conexão com o banco */
    function conexaoMysql()
    {

        $server = "localhost";
        $usuario = "root";
        $senha = "bcd127";
        $banco = "contatos";

        // Conectando-se ao banco.
        $conexao = mysqli_connect($server, $usuario, $senha, $banco);

        return $conexao;

    }

?>