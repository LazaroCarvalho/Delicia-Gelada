<?php 

    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    $conexao = conexaoMysql();

    // Verifica se houve uma requisição a página
    if(isset($_GET['codigo']))
    {

        // O nome da tabela especifíca em qual tabela será feito o DELETE.
        // O nome da página especifíca para qual pag o header 
        // Retornará se o script for executado com sucesso.
        $nomeTabela = $_GET['tabela'];
        $pagina = $_GET['pagina'];

        $sql = "DELETE FROM ".$nomeTabela." WHERE id = ".$_GET['codigo'];

        if(mysqli_query($conexao, $sql))
            header("location: ../".$pagina);
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>