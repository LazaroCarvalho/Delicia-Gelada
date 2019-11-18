<?php 

    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    $conexao = conexaoMysql();

    if(isset($_GET['codigo']))
    {

        // Recebendo o inverso do estado do status atual. 
        ($_GET['status'] == 1) ? $status = 0 : $status = 1;

        // Desativando os status de todos os registros e alterando o registro modificado.
        $sql = "UPDATE sectionum_sobre SET status = 0 WHERE id <> ".$_GET['codigo'];
                
            
        // Verificando se os scripts ocorreram com sucesso.
        if(mysqli_query($conexao, $sql))
        {

            // Executando o segundo UPDATE no banco. Altera o status do registro alterado.
            $sql = "UPDATE sectionum_sobre SET status = ".$status." WHERE id = ".$_GET['codigo'];

            // Verifica se o script deu certo.
            if(mysqli_query($conexao, $sql))
                header("location: ../secaoUmSobre.php");
            else
                echo(ERRO_EXECUCAO_SCRIPT);

        }
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>