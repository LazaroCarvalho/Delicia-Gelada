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
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $corFundo = $_POST['cor_fundo'];
        $status = 1;
        $cor_text = (string) "";

        // Verifica o tema escolhido para a fonte. Alterna a cor entre branco e preto.
        if(strtoupper($_POST['cor_texto']) == "LIGHT")
            $corFont = "#000000";
        else
            $corFont = "#ffffff";

        
        // Sempre que um registro for salvo ou editado, torna-se ativo. Todos os outros são desativados.
        // Este update se encarrega de, antes de qualquer execução, desativar todos os status (status = 0).
        $sql = "UPDATE introducao_lojas SET status = 0 WHERE status = 1";
        if(mysqli_query($conexao, $sql))
        {
        
            // Verifica se o modo é salvar.
            if(strtoupper($_POST['modo']) == "SALVAR")
            {

                // Se nenhuma imagem foi selecionada, o insert não deve inserir imagem alguma
                if(isset($_SESSION['imagemPreview']))
                {
                    // Neste IF, o insert insere a imagem selecionada.
                    $sql = "INSERT INTO introducao_lojas (titulo, texto, imagem, cor_fundo, status, cor_texto)
                            VALUES ('".$titulo."', '".$texto."',
                            '".$_SESSION['imagemPreview']."',
                            '".$corFundo."', '".$status."', '".$corFont."')";
                }
                else {
                    // Neste IF, o insert não insere imagem alguma, pois nenhuma foi selecionada.
                    $sql = "INSERT INTO introducao_lojas (titulo, texto, cor_fundo, status, cor_texto)
                                    VALUES ('".$titulo."', '".$texto."',
                                    '".$corFundo."', '".$status."', '".$corFont."')";
                }
            }

            // Verifica se o modo é editar.
            if(strtoupper($_POST['modo']) == "EDITAR")
            {
                // Se nenhuma imagem foi selecionada, o update não deve inserir imagem alguma
                if(isset($_SESSION['imagemPreview'])) {
                    $imagemAntiga = "arquivos/".$_SESSION['imagemRegistro'];

                    // Neste IF, o update insere a imagem selecionada.
                    $sql = "UPDATE introducao_lojas SET titulo = '".$titulo."', 
                            texto = '".$texto."', imagem = '".$_SESSION['imagemPreview']."',
                            cor_fundo = '".$corFundo."', status = '".$status."', 
                            cor_texto = '".$cor_text."' WHERE id = ".$_SESSION['codigoRegistro'];
                }
                else
                    // Neste IF, o update não insere imagem alguma, pois nenhuma foi selecionada.
                    $sql = "UPDATE introducao_lojas SET titulo = '".$titulo."', 
                            texto = '".$texto."', cor_fundo = '".$corFundo."',
                            status = '".$status."', cor_texto = '".$corFont."' WHERE id = ".$_SESSION['codigoRegistro'];

            }

        }
        else
            echo(ERRO_EXECUCAO_SCRIPT);


        // Verificando se o script foi executado com sucesso.
        if(mysqli_multi_query($conexao, $sql)) {

            // Verifica se as seguintes variáveis de sessão existem. Se existirem, são excluidas.
            if(isset($_SESSION['imagemPreview'])){  
                if(strtoupper($_POST['modo']) == "EDITAR")  // Se o modo for editar e existir imagemPreview
                    unlink($imagemAntiga);

                unset($_SESSION['imagemPreview']);
            }

            if(isset($_SESSION['codigoRegistro']))
                unset($_SESSION['codigoRegistro']);

            unset($_SESSION['imagemRegistro']);
            header('location: ../introducaoLojas.php?select-curiosidades=introducao_lojas');

        }
        
        
        
    }

?>