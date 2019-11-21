<?php 

    // Importando arquivos.
    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    $conexao = conexaoMysql();

    // Verifica se esta página foi requisitada
    if(isset($_GET['codigo']))
    {

        $status = (boolean) 0;

        if($_GET['status'] == 1)
            $status = 0;
        else
            $status = 1;

        // Altera o status do registro selecionado.
        $sql = "UPDATE tbllojas SET status = '".$status."' WHERE id = ".$_GET['codigo'];

        // Se o script correr corretamente, retorna a página de requisição.
        if(mysqli_query($conexao, $sql))
            header("location: ../".$_GET['pagina']);
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>