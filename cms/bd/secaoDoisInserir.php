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
        $texto = $_POST['texto'];
        $corFont = $_POST['cor_texto'];
        $status = 1;

        $sql = "UPDATE sectiondois_sobre SET status = 0 WHERE status = 1";

        // Executa o UPDATE e seta todos os stauts como 0.
        if(mysqli_query($conexao, $sql))
        {
            
            // Verificando se o modo é SALVAR.
            if(strtoupper($_POST['submit-header']) == "SALVAR")
            {

                // Verifica se uma imagem foi selecionada
                if(isset($_SESSION['imagemPreview']))          
                    // Script para inserir os valores no banco e inserindo imagem.
                    $sql = "INSERT INTO sectiondois_sobre (titulo, texto,
                            imagem, cor_texto,
                            status)
                            VALUES ('".$titulo."', '".$texto."', 
                                    '".$_SESSION['imagemPreview']."', '".$corFont."',
                                    '".$status."')";
                else
                    // Script para inserir os valores no banco, mas sem inserir imagem.
                    $sql = "INSERT INTO sectiondois_sobre (titulo, texto, cor_texto,
                            status)
                            VALUES ('".$titulo."', '".$texto."',
                                    '".$corFont."', '".$status."')";
                    
            } // Script a ser executado caso o mdo seja editar.
            else if(strtoupper($_POST['submit-header']) == "EDITAR") {

                // Se uma imagem foi selecionada, insere-a no banco
                if(isset($_SESSION['imagemPreview']))          
                    $sql = "UPDATE sectiondois_sobre SET titulo = '".$titulo."', texto = '".$texto."',
                                imagem = '".$_SESSION['imagemPreview']."', cor_texto = '".$corTitulo."',
                                status = '".$status."' WHERE id = ".$_SESSION['codigoRegistro'];
                else    // Se não, insere infos no banco sem imagem.
                    $sql = "UPDATE sectiondois_sobre SET titulo = '".$titulo."', texto = '".$texto."',
                                   cor_texto = '".$corTitulo."',
                                   status = '".$status."' WHERE id = ".$_SESSION['codigoRegistro'];
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
            if(strtoupper($_POST['modo']) == "EDITAR"){
                unset($_SESSION['imagemAntiga']);
                unset($_SESSION['codigoRegistro']);
            }

                
            header("location: ../secaoDoisSobre.php");
        }
        else
            echo($sql);

    }

?>