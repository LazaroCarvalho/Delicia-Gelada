<?php
    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    // Iniciando as variáveis de sessão.
    if(!isset($_SESSION))
        session_start();

    // Realizando conexão com o banco.
    $conexao = conexaoMysql();

    // Verificando se esta página foi requisitada.
    if(isset($_POST['submitConteudo']))
    {
        
        // resgatando valores do post.
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        $status = 1;
        
        // Verificando se o registro está sendo editado ou salvo.
        if(strtoupper($_POST['submitConteudo']) == "SALVAR")
        {
            // Realizando insert com a imagem selecionada pelo usuário.
            if(isset($_SESSION['imagemPreview']))
                $sql = "INSERT INTO tbllojas (rua, cidade, estado, telefone, imagem, status)
                        VALUES ('".$rua."', '".$cidade."', 
                                '".$estado."', '".$telefone."', 
                                '".$_SESSION['imagemPreview']."', '".$status."')";
            
            else    // Realizando insert sem imagem.
                 $sql = "INSERT INTO tbllojas (rua, cidade, estado, telefone, imagem, status)
                        VALUES ('".$rua."', '".$cidade."', 
                                '".$estado."', '".$telefone."',
                                '".$status."')";   
                
        } else if(strtoupper($_POST['submitConteudo']) == "EDITAR")
        {
            
            // Realizando update com a imagem selecionada pelo usuário.
            if(isset($_SESSION['imagemPreview']))
                $sql = "UPDATE tbllojas SET rua = '".$rua."', cidade = '".$cidade."', 
                        estado = '".$estado."', telefone = '".$telefone."', imagem = '".$_SESSION['imagemPreview']."', status = '".$status."' WHERE id = ".$_SESSION['codigoRegistro'];
            
            else    // Realizando update sem imagem.
                 $sql = "UPDATE tbllojas SET rua = '".$rua."', cidade = '".$cidade."', 
                        estado = '".$estado."', telefone = '".$telefone."', status = '".$status."' WHERE id = ".$_SESSION['codigoRegistro']; 
            
        }
        
        if(mysqli_query($conexao, $sql))
        {
            
            if(isset($_SESSION['imagemPreview'])){
                if(strtoupper($_POST['submitConteudo']) == "EDITAR")
                    unlink("arquivos/".$_SESSION['imagemRegistro']);
                
                unset($_SESSION['imagemPreview']);
            }
            
            unset($_SESSION['imagemRegistro']);
            unset($_SESSION['codigoRegistro']);
            header("location: ../introducaoLojas.php?select-curiosidades=tbllojas");
        }
        else
            echo $sql;
        
    }
    else
        echo $sql;

?>