<?php

    // Este arquivo serve para alterar o status de conteúdos que serão únicos em uma página.
    // Assim, ao ativar o status de um conteúdo na tabela, o status de todos os outros será desativado
    // Assegurando de que haverá, em todos os casos, apenas UMA sessão de conteúdo deste tipo ativo na página.

    // Importando arquivos.
    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    $conexao = conexaoMysql();

    // Verifica se esta página foi requisitada
    if(isset($_GET['codigo']))
    {

        // Recebe a tabela em que deve ser executado o script.
        // E a pagina que deve-se retornar ao executar o script com sucesso.
        $tabela = $_GET['tabela'];
        $pagina = $_GET['pagina'];

        $status = (boolean) 0;

        // Verifica o status e inverte seu valor. Se for 0, torna-se 1 e vice-versa.
        ($_GET['status'] == 1) ? $status = 0 : $status = 1;

        $sql = "UPDATE ".$tabela." SET status = ".$status." WHERE id = ".$_GET['codigo'];

        if(mysqli_query($conexao, $sql)){

            // O segundo UPDATE torna-se necessário para assegurar de que haverá, em todos os casos,
            // Apenas UM registro com status ativado!
            $sql = "UPDATE ".$tabela." SET status = 0 WHERE id <> ".$_GET['codigo'];

            if(mysqli_query($conexao, $sql))
                header("location: ../".$pagina);

        }
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>