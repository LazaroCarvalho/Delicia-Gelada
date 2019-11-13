<?php 

    require_once('conexao.php');
    require_once('../modulos/constantes.php');
    $conexao = conexaoMysql();

    // Verificando se as variáveis de sessão já foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    // Verifica se o formulário foi submetido para a página.
    if(isset($_POST['submitNiveis']))
    {
        
        $codigo = $_SESSION['codigo'];

        $nomeNivel = (string) "";
        $faleConosco = (boolean) 0;
        $admConteudo = (boolean) 0;
        $admUsuarios = (boolean) 0;
        
        // Recebendo os valores inseridos no nível.
        
        $nomeNivel = $_POST['nome_nivel'];
        
        // Verifica se a caixa de Adm. Fale Conosco foi marcada.
        if(isset($_POST['chk_faleconosco']))
            $faleConosco = true;
        else
            $faleConosco = 0;
    
        // Verifica se a caixa de Adm. Conteúdo foi marcada.
        if(isset($_POST['chk_admconteudo']))
            $admConteudo = true;
        else
            $admConteudo = 0;
        
        // Verifica se a caixa de Adm. Usuários foi marcada.
        if(isset($_POST['chk_usuarios']))
            $admUsuarios = true;
        else
            $admUsuarios = 0;
        
        // O status do nível recebe true por padrão ao ser criado.
        $status = true;
        
        // Verifica se o registro está sendo Editado ou Inserido pela primeira vez no banco.
        if(strtoupper($_POST['submitNiveis']) == "EDITAR")
        {

            // Script para ATUALIZAR registro no banco, caso esteja sendo editado.
            $sql = "UPDATE tblniveis SET nome = '".$nomeNivel."', 
            adm_faleconosco = '".$faleConosco."',
            adm_conteudo = '".$admConteudo."', 
            adm_usuarios = '".$admUsuarios."', 
            status_nivel = '".$status."' 
            WHERE id = ".$codigo;
            echo($sql);

        }
        else
        {

            // Script de inserção no banco. Insere os dados coletados acima.
            $sql = "INSERT INTO tblniveis 
            (nome, adm_faleconosco, adm_conteudo, adm_usuarios, status_nivel) 
            VALUES ('".$nomeNivel."', '".$faleConosco."', '".$admConteudo."', '".$admUsuarios."', '".$status."')";

        }

        //Se o script ocorrer corretamente, volta a página de adm. Usuários. Caso contrário, exibe mensagem de erro.
        if(mysqli_query($conexao, $sql))
            header("location:../admNiveis.php");
        else
            echo(ERRO_EXECUCAO_SCRIPT);
        
    }

?>