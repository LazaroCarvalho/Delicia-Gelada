<?php

    require_once('conexao.php');
    require_once('../modulos/constantes.php');
    $conexao = conexaoMysql();

    // Se a variável 'codigo' existir, a página foi chamada.
    if (isset($_GET['codigo']))
    {

        // Verifica se a opção de alterar o STATUS foi selecionada.
        if (strtoupper($_GET['modo']) == 'STATUS')
        {

            // Pegando as variáveis da URL
            $codigo = $_GET['codigo'];
            $status = $_GET['status'];
            $statusAlterado = (boolean) false;

            if($status == 1)    // Se o status estiver ativado, será desativado e vice-versa.
                $statusAlterado = 0;
            else
                $statusAlterado = 1;

            // Script para atualizar o banco e alterar o status.
            $sql = "UPDATE tblniveis SET status_nivel = '".$statusAlterado."' 
                    WHERE id = ".$codigo;

            //  Verifica se o script foi executado com sucesso no banco.
            if(mysqli_query($conexao, $sql))
                header('location:../admNiveis.php');
            else
                echo("Erro ao executar SCRIPT");

        }

        // Verifica se a opção de EXCLUIR o registro foi selecionada.
        if (strtoupper($_GET['modo']) == "EXCLUIR")
        {

            $codigo = $_GET['codigo'];
            
            // Deletando todos os usuários associados a este nível, para poder deletá-lo.
            $sql = "DELETE from tblusuarios WHERE codnivel = ".$codigo;
            
            // Se os usuários foram deletados com sucesso, deleta o nível.
            if(mysqli_query($conexao, $sql)){
                
                // Script para deletar registro do banco.
                $sql = "DELETE FROM tblniveis WHERE id = ".$codigo;
                
                //Verificando se o script foi executado com sucesso.  
                if(mysqli_query($conexao, $sql))
                    header("location:../admNiveis.php");
                else
                    echo($sql);
                
            }
            else
                echo($sql);

            
            

             
            

        }

    }

?>