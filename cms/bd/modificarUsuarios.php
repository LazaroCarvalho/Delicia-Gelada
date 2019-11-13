<?php 

    // Importando arquivos e realizando conexão com o banco.
    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    $conexao = conexaoMysql();

    // Verificando se esta página foi requisitada.
    if(isset($_GET['modo']))
    {

        // Verificando se o botão de alterar o STATUS foi clicado.
        if(strtoupper($_GET['modo']) == "STATUS")   
        {

            // Resgatando valores.
            $codigo = $_GET['codigo'];
            $status = (boolean) 0;

            // Inserindo no campo 'status', no banco, o valor contrário ao status atual.
            if($_GET['status'] == 1)
                $status = 0;
            else
                $status = true;

            //Script para atualizar o campo status no banco.
            $sql = "UPDATE tblusuarios SET status = '".$status."' WHERE id = ".$codigo;

            // Verificando se o script foi executado com sucesso e voltando para a página inicial.
            if(mysqli_query($conexao, $sql))
                header('location:../admUsuarios.php');
            else
                echo(ERRO_EXECUCAO_SCRIPT);
            

        }
        // Verifica se o botão de EXCLUIR o registro foi selecionado.
        else if(strtoupper($_GET['modo']) == "EXCLUIR")
        {

            $codigo = $_GET['codigo'];

            // script npara excluir o registro do banco.
            $sql = "DELETE FROM tblusuarios WHERE id = ".$codigo;

            if(mysqli_query($conexao, $sql))
                header('location:../admUsuarios.php');
            else
                echo(ERRO_EXECUCAO_SCRIPT);

        }
        
    }

?>