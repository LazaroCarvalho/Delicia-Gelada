<?php

    // Importando arquivos e realizando conexão comn o banco.
    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();

    // Verificando se o formulário foi submetido a esta página.
    if(isset($_POST['submitUsuarios']))
    {

        // Resgatando valores do post.
        $usuario = $_POST['txt_usuario'];
        $nome = $_POST['txt_nome'];
        $email = $_POST['txt_email'];
        $nivelId = $_POST['nivel'];

        // Ao criar um usuário, este é inserido com status ativado.
        $status = true;

        // Verifica se o registro está sendo inserido pela primeira vez ou sendo editado.
        if(strtoupper($_POST['submitUsuarios']) != "EDITAR")
        {

            $senha = $_POST['txt_senha'];

            // Criptografando a senha.
            $senhaCriptografada = md5($senha);

            // Script para inserir os dados do usuário no banco.
            $sql = "INSERT INTO tblusuarios (usuario, nome, email, senha, codnivel, status)
            VALUES ('".$usuario."', '".$nome."', 
            '".$email."', '".$senhaCriptografada."', 
            '".$nivelId."', '".$status."');";

        } 
        else { // Caso o registro esteja sendo editado, cai neste else.

            // Verifica se o usuário desejou ou não alterar a senha.
            if(isset($_GET['txt_senha']))
            {

                $senha = $_POST['txt_senha'];

                // Script a ser executado caso o usuário tenha registrado uma nova senha.
                $sql = "UPDATE tblusuarios SET usuario = '".$usuario."', nome = '".$nome."',
                        email = '".$email."', senha = '".$senha."', 
                        codnivel = ".$nivelId.", status = '".$status."' 
                        WHERE id = ".$_SESSION['codigo'];

            }
            else {

                // Script a ser executado caso o usuário tenha mantido a senha antiga.
                $sql = "UPDATE tblusuarios SET usuario = '".$usuario."', nome = '".$nome."',
                        email = '".$email."', codnivel = ".$nivelId.",
                         status = '".$status."' WHERE id = ".$_SESSION['codigo'];

            }

        }

        if(mysqli_query($conexao, $sql))
            header('location:../admUsuarios.php');
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>