<?php 

    // Importando arquivos
    require_once("conexao.php");
    require_once("../modulos/constantes.php");

    // Verificando se as variáveis de sessão foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    $conexao = conexaoMysql();

    // Verifica se a página foi requisitada.
    if(isset($_POST['submitConteudo']))
    {
        
        // Pegando valores por post.
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $corTitulo = $_POST['cor_titulo'];
        $corSubtitulo = $_POST['cor_subtitulo'];
        $status = 1;

        $sql = "UPDATE header_sobre SET status = 0 WHERE status = 1";

        // Executa o UPDATE e seta todos os stauts como 0.
        if(mysqli_query($conexao, $sql))
        {
            
            // Verificando se o modo é SALVAR.
            if(strtoupper($_POST['submitConteudo']) == "SALVAR")
            {

                // Verifica se uma imagem foi selecionada
                if(isset($_SESSION['imagemPreview']))          
                    // Script para inserir os valores no banco e inserindo imagem.
                    $sql = "INSERT INTO header_sobre (titulo, subtitulo,
                            imagem, cor_titulo, 
                            cor_subtitulo, status)
                            VALUES ('".$titulo."', '".$subtitulo."', 
                                    '".$_SESSION['imagemPreview']."', '".$corTitulo."', 
                                    '".$corSubtitulo."', '".$status."')";
                else
                    // Script para inserir os valores no banco, mas sem inserir imagem.
                    $sql = "INSERT INTO header_sobre (titulo, subtitulo, cor_titulo, 
                            cor_subtitulo, status)
                            VALUES ('".$titulo."', '".$subtitulo."',
                                    '".$corTitulo."','".$corSubtitulo."', 
                                    '".$status."')";
                    
            } // Script a ser executado caso o mdo seja editar.
            else if(strtoupper($_POST['submitConteudo']) == "EDITAR") {

                // Se uma imagem foi selecionada, insere-a no banco
                if(isset($_SESSION['imagemPreview']))          
                    $sql = "UPDATE header_sobre SET titulo = '".$titulo."', subtitulo = '".$subtitulo."',
                                imagem = '".$_SESSION['imagemPreview']."', cor_titulo = '".$corTitulo."',
                                cor_subtitulo = '".$corSubtitulo."', status = '".$status."' WHERE id = ".$_SESSION['codigoRegistro'];
                else    // Se não, insere infos no banco sem imagem.
                    $sql = "UPDATE header_sobre SET titulo = '".$titulo."', subtitulo = '".$subtitulo."',
                                   cor_titulo = '".$corTitulo."',
                                   cor_subtitulo = '".$corSubtitulo."', status = '".$status."' WHERE id = ".$_SESSION['codigoRegistro'];
            }

        }
        else 
            echo(ERRO_EXECUCAO_SCRIPT);
                        
                    
        // Insere no banco e verifíca se o script correu corretamente.
        if(mysqli_query($conexao, $sql)){

            // Se a imagem foi alterada, exclui sua variável de sessão.
            if(isset($_SESSION['imagemPreview']))
            {
                if(strtoupper($_POST['modo']) == "EDITAR")// Se o modo é editar, exclui também a imagem antiga.
                    unlink("arquivos/".$_SESSION['imagemAntiga']);

                unset($_SESSION['imagemPreview']);
            }

            // Excluindo variável de sessão e voltando a página.
            if(strtoupper($_POST['modo']) == "EDITAR")
                unset($_SESSION['imagemAntiga']);
                unset($_SESSION['codigoRegistro']);
            }

            header("location: ../admHeaderSobre.php");
        }
        else
            echo($sql);

?>