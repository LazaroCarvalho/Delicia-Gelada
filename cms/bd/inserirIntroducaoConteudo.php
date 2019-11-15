<?php 

    require_once("conexao.php");
    require_once("../modulos/constantes.php");

    if(!isset($_SESSION))
        session_start();

    $conexao = conexaoMysql();

    // Verifica se houve inserção de conteúdo.
    if(isset($_POST['submitConteudo']))
    {
        
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $corFundo = $_POST['color'];
        $status = 1;
        
        // Verifica se o modo é edição ou salvar.
        if(strtoupper($_POST['submitConteudo']) == "SALVAR")
        {

            $sql = "UPDATE introducao_curiosidades SET status = 0 WHERE status = 1;
                    INSERT INTO introducao_curiosidades (titulo, texto, imagem, cor_fundo, status)
                            VALUES ('".$titulo."', '".$texto."',
                            '".$_SESSION['imagemPreview']."',
                            '".$corFundo."', '".$status."')";
            
            if(mysqli_multi_query($conexao, $sql))
                header('location: ../introducaoCuriosidades.php');
            else
                echo(ERRO_EXECUCAO_SCRIPT);

        }
        
        
    }

?>