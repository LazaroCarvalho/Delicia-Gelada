<?php 

    // Importando arquivos
    require_once("conexao.php");
    require_once("../modulos/constantes.php");

    // Verificando se as variáveis de sessão foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    $conexao = conexaoMysql();

    // Verifica se houve inserção de conteúdo.
    if(isset($_POST['submitConteudo']))
    {
        
        // Coletando as informações da introdução registrada.
        $titulo1 = $_POST['titulo1'];
        $texto1 = $_POST['texto1'];
        $titulo2 = $_POST['titulo2'];
        $texto2 = $_POST['texto2'];
        $titulo3 = $_POST['titulo3'];
        $texto3 = $_POST['texto3'];
        $titulo4 = $_POST['titulo4'];
        $corFundo = $_POST['color'];
        $corFont = $_POST['colorFont'];
        $status = 1;
        

        // Verifica o tema escolhido para a fonte. Alterna a cor entre branco e preto.
        if(strtoupper($_POST['colorFont']) == "LIGHT")
            $corFont = "#000000";
        else
            $corFont = "#ffffff";

        // Verifica se o usuário salvou ou editou o registro.
        if(strtoupper($_POST['modo']) == "SALVAR")
        {

            if(isset($_SESSION['imagemPreview']))
            {

                // Se uma imagem foi selecionada, faz o INSERT inserindo esta imagem.
                $sql = "INSERT INTO section_curiosidades 
                (titulo_um, titulo_dois, texto_um,
                titulo_tres, texto_dois, titulo_quatro,
                texto_tres, imagem, cor_fundo,
                cor_texto, status)
                VALUES ('".$titulo1."', '".$titulo2."',
                        '".$texto1."', '".$titulo3."',
                        '".$texto2."', '".$titulo4."', 
                        '".$texto3."', '".$_SESSION['imagemPreview']."', 
                        '".$corFundo."', '".$corFont."', 
                        '".$status."')";

            }
            else {
                // Se nenhuma imagem foi selecionada, faz INSERT sem inserir nenhuma imagem.
                $sql = "INSERT INTO section_curiosidades 
                (titulo_um, titulo_dois, texto_um,
                titulo_tres, texto_dois, titulo_quatro,
                texto_tres, cor_fundo,
                cor_texto, status)
                VALUES ('".$titulo1."', '".$titulo2."',
                        '".$texto1."', '".$titulo3."',
                        '".$texto2."', '".$titulo4."', 
                        '".$texto3."', '".$corFundo."', 
                        '".$corFont."', '".$status."')";

            }

        }

        if(strtoupper($_POST['modo']) == "EDITAR")
        {

            // Verifica se outra imagem foi selecionada.
            if(isset($_SESSION['imagemPreview']))
            {

                // Se uma imagem foi selecionada, faz o UPDATE inserindo a nova imagem.
                $sql = "UPDATE section_curiosidades 
                        SET titulo_um = '".$titulo1."', titulo_dois = '".$titulo2."', 
                            texto_um = '".$texto1."', titulo_tres = '".$titulo3."',
                            texto_dois = '".$texto2."', titulo_quatro = '".$titulo4."',
                            texto_tres = '".$texto3."', imagem = '".$_SESSION['imagemPreview']."',
                            cor_fundo = '".$corFundo."', cor_texto = '".$corFont."', 
                            status = '".$status."' WHERE id = ".$_SESSION['codigoConteudo'];

            }
            else {
                // Se nenhuma imagem foi selecionada, faz o UPDATE sem enviar uma nova imagem, mantendo a anterior.
                $sql = "UPDATE section_curiosidades 
                        SET titulo_um = '".$titulo1."', titulo_dois = '".$titulo2."', 
                            texto_um = '".$texto1."', titulo_tres = '".$titulo3."',
                            texto_dois = '".$texto2."', titulo_quatro = '".$titulo4."',
                            texto_tres = '".$texto3."', cor_fundo = '".$corFundo."', cor_texto = '".$corFont."', 
                            status = '".$status."' WHERE id = ".$_SESSION['codigoConteudo'];

            }

        }

        // Verificando se o script foi executado com sucesso e retornando para a página de requisição.
        if(mysqli_query($conexao, $sql))
        {

            if(isset($_SESSION['imagemPreview']))
            {
                // Apaga a imagem antiga, caso o usuário tenha upado uma nova foto.
                if(strtoupper($_POST['modo']) == "EDITAR")
                    unlink("arquivos/".$_SESSION['imagemRegistro']);

                unset($_SESSION['imagemPreview']);

            }

            unset($_SESSION['codigoConteudo']);
            unset($_SESSION['imagemRegistro']);
            header("location: ../admCuriosidades.php");

        }
        else
            echo(ERRO_EXECUCAO_SCRIPT);

    }

?>