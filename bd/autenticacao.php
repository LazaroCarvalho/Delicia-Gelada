<?php

    if(!isset($_SESSION))
        session_start();

    // Importando arquivos.
    require_once('conexao.php');
    require_once('../modulos/constantes.php');

    // Realizando a conexão com o banco de dados.
    $conexao = conexaoMysql();

    // Verifica se o usuário tentou fazer login.
    if(isset($_POST['btnLogin']))
    {

        // Recebendo as informações digitadas no formulário de login
        $usuarioInserido = $_POST['usuario'];
        $senhaInserida = $_POST['senha'];
        $origemRequisicao = $_POST['pagina_requisicao'];

        // Verificando se o usuário digitado existe no banco.
        $sql = "SELECT * FROM tblusuarios WHERE usuario = '".$usuarioInserido."'";
        $select = mysqli_query($conexao, $sql);

        // Se o usuário existir, verifica se a senha está correta.
        if($rsUsuario = mysqli_fetch_array($select))
        {

            // Criptografa a senha inserida 
            // Verifica se esta é igual a do banco (Também criptografada).
            if(md5($senhaInserida) == $rsUsuario['senha']) 
            {

                // Verifica se o usuário possui status ativo.
                if($rsUsuario['status'] == 1) {

                    $_SESSION['id_usuario'] = $rsUsuario['id'];
                    header("location: ../cms/home.php");

                }
                else {
                    // Erro a ser exibido caso o usuário que tente logar esteja desativado.
                    $_SESSION['falha_autenticacao'] = ERRO_STATUS_DESATIVADO;
                    header("location: ../".$origemRequisicao.".php");

                }

            }
            else {
                // Erro a ser exibido caso a senha inserida esteja incorreta.
                $_SESSION['falha_autenticacao'] = ERRO_SENHA_INCORRETA;
                header("location: ../".$origemRequisicao.".php");

            }

        } else {
            //Se o usuário não existir, volta para a pagina que enviou a requisição.
            //Mostra alerta de erro.
            $_SESSION['falha_autenticacao'] = ERRO_USUARIO_INEXISTENTE;
            header("location: ../".$origemRequisicao.".php");

        }

    }

?>