<?php 

    // Importando arquivos
    require_once("conexao.php");
    require_once("../modulos/constantes.php");

    // Verificando se as variáveis de sessão foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    $conexao = conexaoMysql();

    // Verifica se a página foi requisitada.
    if(isset($_POST['submit-header']))
    {

        // Pegando valores por post.
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $imagem = $_SESSION['imagemPreview'];
        $corTitulo = $_POST['colorTitulo'];
        $corSubtitulo = $_POST['colorSubtitulo'];
        $status = 1;

        // Script para inserir os valores no banco.
        $sql = "UPDATE header_sobre SET status = 0 WHERE status = 1;
                INSERT INTO header_sobre (titulo, subtitulo,
                imagem, cor_titulo, 
                cor_subtitulo, status)
                VALUES ('".$titulo."', '".$subtitulo."', 
                        '".$imagem."', '".$corTitulo."', 
                        '".$corSubtitulo."', '".$status."')";
                    
        // Insere no banco e verifíca se o script correu corretamente.
        if(mysqli_multi_query($conexao, $sql))
            header("location: ../admHeaderSobre.php");
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>