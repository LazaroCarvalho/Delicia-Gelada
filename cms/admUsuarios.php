<?php 

    // Importando arquivos.
    require_once('modulos/constantes.php');
    require_once('modulos/footer.php');
    require_once('bd/conexao.php');
    require_once('modulos/funcoes.php');

    // Conectando-se ao banco.
    $conexao = conexaoMysql();

    // Verificando se as variáveis de sessão já foram iniciadas.
    if(!isset($_SESSION))
        session_start();


    // Retorna os elementos HTML equivalentes ao nível de permissões do usuário.
    $elementoHtmlPermissoes = permissoesUsuario($conexao, $_SESSION['id_usuario']);

    $usuario = (string) "";
    $nome = (string) "";
    $email = (string) "";
    $idNivel = (int) 0;
    $disabledInput = (string) "";
    $botaoSubmit = (string) "Criar Usuário";
    $tagCheckbox = (string) "";

    // Se o botão EDITAR foi pressionado, recebe as informações e envia ao formulário para edição do registro.
    if(isset($_GET['modo']))
    {

        $codigo = $_GET['codigo'];

        // Trazendo o registro do banco a partir do ID recebido por GET.
        $sql = "SELECT * FROM tblusuarios WHERE id = ".$codigo;
        $select = mysqli_query($conexao, $sql);

        if($rsUsuarios = mysqli_fetch_array($select))
        {
            // Pegando as informações do registro.
            $usuario = $rsUsuarios['usuario'];
            $nome = $rsUsuarios['nome'];
            $email = $rsUsuarios['email'];
            $idNivel = $rsUsuarios['codnivel'];

            $_SESSION['codigo'] = $rsUsuarios['id'];
            $disabledInput = "disabled = 'disabled'";
            $botaoSubmit = "Editar";
            $tagCheckbox = "<input type='checkbox' name='chksenha' id='checkbox_senha'>
                            <label id='label_checkbox'>Deseja alterar sua senha?</label>'";

        }
        else {
            echo(ERRO_EXECUCAO_SCRIPT);
        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Administração de Usuários</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery.js"></script>
    </head>
    <body>
        <div class="imagem_fundo">
            <section class="cms">
                <div class="conteudo center">
                    <!-- Conteudo do CMS -->
                    <div class="container_cms center">
                        <div class='container_cabecalho_cms'>
                            <div class='cms_titulo'>
                                <div class='container_titulo'>
                                    <div class='titulo'>
                                        <div class='cont_titulo'>
                                            <h1 class='titulo_style'> CMS - </h1>
                                        </div>
                                        <div class='cms_subtitulo'>
                                            <h2 class='subtitulo_style'>
                                                Sistema de Gerenciamento do Site
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class='cms_imagem'>

                                </div>
                            </div>
                            <div class='cms_menu'>
                                <?=$elementoHtmlPermissoes;?>
                                <div class='container_logout'>
                                    <p class='text_logout'>
                                    <?php
                                        $sql = "SELECT * FROM tblusuarios WHERE id = ".$_SESSION['id_usuario'];
                                        $select = mysqli_query($conexao, $sql);

                                        if($rsUsuario = mysqli_fetch_array($select))
                                        {
                                    ?>
                                        Bem-Vindo(a), <?=$rsUsuario['nome'];?> 
                                    <?php } ?>
                                    </p>
                                    <form name='frmformulario' method='post' action='home.php' class='input_logout'>
                                        <input type='button' value='Logout' class='button_logout'>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Conteúdo -->
                        <div class="cms_conteudo" id="cms_conteudo_cadastro">
                            <div id="cont_cadastro_usuario">       
                                <div id="cont_conteudo_all">
                                    <div class="container_menu">
                                        <ul class="menu">
                                            <a href="admNiveis.php">
                                                <li class="menu_itens">
                                                    Administrar Níveis
                                                </li>
                                            </a>
                                            <a>
                                                <li class="menu_itens">
                                                    Administrar Usuários
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                    <div id="container_cadastro_usuario">
                                        <div class="center" id="caixa_cadastro_usuario">
                                            <div class="center cont_titulo_cadastro">
                                                <div class="center titulo_contato">
                                                    <div class="center contato_texto">
                                                        Criar Usuário
                                                    </div>
                                                    <div class="center img_contato">
                                                        <img src="icons/UserAdd_40960.png" class="icon_contato">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="center container_campos_cadastro">
                                                <form name="formularioUsuario" method="post" action="bd/salvarUsuarios.php">
                                                    <div class="cont_campo_cadastro">
                                                        <div class="nome_campo_cadastro">
                                                            Usuário:
                                                        </div>
                                                        <div class="input_campo_cadastro">
                                                            <input name="txt_usuario" type="text" class="input_text" maxlength="50" value="<?=$usuario?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="cont_campo_cadastro">
                                                        <div class="nome_campo_cadastro">
                                                            Nome:
                                                        </div>
                                                        <div class="input_campo_cadastro">
                                                            <input name="txt_nome" type="text" class="input_text" maxlength="50" value="<?=$nome?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="cont_campo_cadastro">
                                                        <div class="nome_campo_cadastro">
                                                            Email:
                                                        </div>
                                                        <div class="input_campo_cadastro">
                                                            <input id="campo_email" name="txt_email" type="email" class="input_text" maxlength="50"value="<?=$email?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="cont_campo_cadastro">
                                                        <div class="nome_campo_cadastro" id="senha">
                                                            Senha: <?=$tagCheckbox;?>
                                                        </div>
                                                        <div class="input_campo_cadastro">
                                                            <input name="txt_senha" type="password" class="input_text" id="campo_senha" maxlength="50" <?=$disabledInput?> required>
                                                        </div>
                                                    </div>
                                                    <div class="cont_campo_cadastro" id="cadastro_nivel_select">
                                                        <div class="nome_campo_cadastro" id="label_select">
                                                            Nível:
                                                        </div>
                                                        <select name="nivel" id="select_usuarios" required>
                                                            <option value="" selected>
                                                                Selecione um nível..
                                                            </option>
                                                            <?php

                                                                // Trazendo todos os níveis do banco e usando suas informações no <option>
                                                                $sql = "SELECT * FROM tblniveis";
                                                                $select = mysqli_query($conexao, $sql);

                                                                while($rsNiveis = mysqli_fetch_array($select))
                                                                {
                                                                    // Comparando o ID dos niveis com o ID do nível do usuário, deixa o nivel do usuário como selected.
                                                            
                                                                    if ($rsNiveis['id'] == $idNivel) {
                                                            ?>

                                                                    <option value="<?=$rsNiveis['id']?>" selected>
                                                                        <?=$rsNiveis['nome'];?>
                                                                    </option>

                                                            <?php }else{?>
                                                                    <option value="<?=$rsNiveis['id']?>">
                                                                        <?=$rsNiveis['nome'];?>
                                                                    </option>
                                                            <?php }}?>
                                                        </select>
                                                    </div>
                                                    <div class="botao_enviar center">
                                                        <input type="submit" name="submitUsuarios" value="<?=$botaoSubmit?>" class="botao_submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="container_usuarios_cadastrados">
                                    <div class="center" id="tabela_usuarios_cadastrados">
                                        <div class="titulo_cadastrados">
                                            Usuários Cadastrados
                                        </div>
                                        <div class="cont_cedulas_tabela">
                                            <div class="nome_cedula">
                                                Usuario
                                            </div>
                                            <div class="nome_cedula">
                                                Nome
                                            </div>
                                            <div class="nome_cedula">
                                                Email
                                            </div>
                                            <div class="nome_cedula">
                                                Nível
                                            </div>
                                            <div class="nome_cedula">
                                                Status
                                            </div>
                                            <div class="nome_cedula">
                                                Opções
                                            </div>
                                        </div>
                                        <?php 
                                        
                                            // Script para trazer os usuários cadastrados no banco e seus níveis .
                                            $sql = "SELECT tblusuarios.*, tblniveis.nome as 'nome_nivel' FROM tblusuarios join tblniveis on tblusuarios.codnivel = tblniveis.id";
                                            $select = mysqli_query($conexao, $sql);

                                            $contador = 0;

                                            while($rsUsuarios = mysqli_fetch_array($select))
                                            {
                                                $contador++;

                                                // Utilizando uma variável contadora para "zebrar" as linhas da tabela.
                                                if($contador % 2 == 0)
                                                    $corLinha = "listra_branca";
                                                else
                                                    $corLinha = "listra_negra";

                                        ?>
                                        <div class="container_dados_campo <?=$corLinha?>">
                                            <div class="campo_info">
                                                <?=$rsUsuarios['usuario'];?>
                                            </div>
                                            <div class="campo_info">
                                                <?=$rsUsuarios['nome'];?>
                                            </div>
                                            <div class="campo_info">
                                                <?=$rsUsuarios['email'];?>
                                            </div>
                                            <div class="campo_info">
                                                <?=$rsUsuarios['nome_nivel'];?>
                                            </div>
                                            <div class="campo_info">
                                            <!-- Verificando o status e exibindo o ícone adequado (Ativado/Desativado) -->
                                            <?php if($rsUsuarios['status'] == 1){ ?>
                                                <a href="bd/modificarUsuarios.php?codigo=<?=$rsUsuarios['id']?>&modo=status&status=<?=$rsUsuarios['status']?>">
                                                    <img src="icons/icons8-toggle-on-32.png" alt="Ativar">
                                                </a>
                                            
                                            <?php } else{ ?>
                                                <a href="bd/modificarUsuarios.php?codigo=<?=$rsUsuarios['id']?>&modo=status&status=<?=$rsUsuarios['status']?>">
                                                    <img src="icons/icons8-toggle-off-32.png" alt="Desativar">
                                                </a>
                                            <?php } ?>
                                            </div>
                                            <div class="campo_info">
                                                <div class="opcoes_imagens">
                                                    <a href="admUsuarios.php?modo=editar&codigo=<?=$rsUsuarios['id'];?>">
                                                        <img src="icons/editar.png" class="imagens_opcoes">
                                                    </a>
                                                    <a onclick="return confirm('Você realmente deseja excluir este registro?')" href="bd/modificarUsuarios.php?modo=excluir&codigo=<?=$rsUsuarios['id']?>">
                                                        <img src="icons/claro.png" class="imagens_opcoes">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script src="js/efeitos.js"></script>
            <!-- Importando rodapé -->
            <?=$footer;?>
        </div>
    </body>
</html>