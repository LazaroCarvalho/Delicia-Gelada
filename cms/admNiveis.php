<?php 
    
    // Importando arquivos.
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

    $nomeNivel = (string) "";
    $checkedConteudo = (string) "";
    $checkedFaleConosco = (string) "";
    $checkedUsuarios = (string) "";
    $botao = "Cadastrar Nível";

    // Verifica se a opção editar do item foi selecionada.
    if(isset($_GET['modo']))
    {

        $codigo = $_GET['codigo'];

        // Script para trazer as informações do banco.
        $sql = "SELECT * FROM tblniveis WHERE id = ".$codigo;
        $select = mysqli_query($conexao, $sql); // Executando script no banco.

        // Trazendo as informações do nível e armazenando-as em variáveis.
        if($nivel = mysqli_fetch_array($select))
        {

            $nomeNivel = $nivel['nome'];
            
            if($nivel['adm_conteudo'] == 1) // Variáveis recebem "checked" se o campo for 1 (checkbox marcado).
                $checkedConteudo = "checked";
            
            if($nivel['adm_faleconosco'] == 1)
                $checkedFaleConosco = "checked";

            if($nivel['adm_usuarios'] == 1)
                $checkedUsuarios = "checked";

        }

        // alterando nome do botão no formulário.
        $botao = "Editar";

        // Criando variável de sessão para ser usada ao editar registro.
        $_SESSION['codigo'] = $codigo;

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Administração de Níveis</title>
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
                                    <form name='frmformulario' method='post' action='bd/logout.php' class='input_logout'>
                                        <input name="btnLogout" type='submit' value='Logout' class='button_logout'>
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
                                            <li class="menu_itens">
                                                <a href="admNiveis.php">
                                                    Administrar Níveis
                                                </a>
                                            </li>
                                            <li class="menu_itens">
                                                <a href="admUsuarios.php">
                                                    Administrar Usuários
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="container_cadastro_niveis">
                                        <div class="center" id="container_niveis">
                                            <div class="center cont_titulo_cadastro">
                                                <div class="center titulo_contato">
                                                    <div class="center contato_texto">
                                                        Criar Nível
                                                    </div>
                                                    <div class="center img_contato" id="img_nivel">
                                                        <img src="icons/line-chart.png" class="icon_contato">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="center container_campos_cadastro">
                                                <form name="formularioNiveis" method="post" action="bd/salvarNiveis.php">
                                                    <div class="cont_campo_cadastro">
                                                        <div class="nome_campo_cadastro">
                                                            Título:
                                                        </div>
                                                        <div class="input_campo_cadastro">
                                                            <input name="nome_nivel" type="text" class="input_text" value="<?=$nomeNivel?>" maxlength="50" required>
                                                        </div>
                                                    </div>
                                                    <div id="cont_campo_nivel">
                                                        <div id="nome_campo_nivel">
                                                            Níveis de permissão:
                                                        </div>
                                                        <div id="cont_permissao">
                                                            <input type="checkbox" name="chk_admconteudo" class="chk_niveis" <?=$checkedConteudo;?> value="adm_conteudo">
                                                            <label>
                                                                Administrar conteúdo do site
                                                            </label>
                                                            <br>
                                                            <input type="checkbox" name="chk_faleconosco" class="chk_niveis" <?=$checkedFaleConosco;?> value="adm_faleconosco">
                                                             <label>
                                                                 Administrar Fale Conosco
                                                            </label>
                                                            <br>
                                                            <input type="checkbox" name="chk_usuarios" class="chk_niveis" <?=$checkedUsuarios;?> value="adm_usuarios"><label>
                                                            Administrar Usuários
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="botao_enviar">
                                                        <input type="submit" name="submitNiveis" value="<?=$botao?>" class="botao_submit" id="btn_niveis">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="container_niveis_cadastrados">
                                    <div class="center" id="tabela_niveis_cadastrados">
                                        <div class="titulo_cadastrados">
                                            Níveis
                                        </div>
                                        <div class="cont_cedulas_tabela">
                                            <div class="nome_cedula">
                                                Nome
                                            </div>
                                            <div class="nome_cedula">
                                            Permissões
                                            </div>
                                            <div class="nome_cedula">
                                            Status
                                            </div>
                                            <div class="nome_cedula">
                                                Opções
                                            </div>
                                        </div>
                                        <?php

                                            /* Trazendo todos os níveis e suas informações do banco */
                                            $sql = "SELECT * FROM tblniveis";

                                            $select = mysqli_query($conexao, $sql);

                                            // Variável contadora para "zebrar" a tabela.
                                            $contador = (int) 0;

                                            while($rsNiveis = mysqli_fetch_array($select))
                                            {
                                                $contador++;

                                                // Verifica as permissões, e exibe os ícones correspondentes a cada uma das permissões do nível
                                                if($rsNiveis['adm_conteudo'] == 1)
                                                    $permissaoConteudoImagem = "<img src='icons/sharing-content.png' alt='Administrador de Conteúdo' class='imagens_permissao'>";
                                                else
                                                    $permissaoConteudoImagem = "";

                                                if($rsNiveis['adm_faleconosco'] == 1)
                                                    $permissaoFaleConoscoImagem = "<img src='icons/help.png' alt='Administrador do Fale Conosco'  class='imagens_permissao'>";
                                                else
                                                    $permissaoFaleConoscoImagem = "";

                                                if($rsNiveis['adm_usuarios'] == 1)
                                                    $permissaoUsuariosImagem = "<img src='icons/silhueta-de-usuarios-do-casal.png' alt='Administrador de Usuários'  class='imagens_permissao'>";
                                                else
                                                    $permissaoUsuariosImagem = "";
                                                
                                                // Utilizando uma variável contadora para "zebrar" as listras da tabela.
                                                if($contador % 2 == 0)
                                                    $corLinha = "listra_branca";
                                                else
                                                    $corLinha = "listra_negra";

                                        ?>
                                        <div class="container_dados_campo <?=$corLinha?>">
                                            <div class="campo_info">
                                                <?=$rsNiveis['nome']?>
                                            </div>
                                            <div class="campo_info">
                                                <div class="permissao">
                                                    <?=$permissaoConteudoImagem;?>
                                                    <?=$permissaoFaleConoscoImagem;?>
                                                    <?=$permissaoUsuariosImagem;?>
                                                </div>
                                            </div>
                                            <div class="campo_info">
                                                <?php
                                                    //Verifica o status do usuário, afim de exibir o ícone específico (Ativado/Desativado).
                                                    if($rsNiveis['status_nivel'] == 1) {
                                                ?>
                                                <a href="bd/modificarNiveis.php?codigo=<?=$rsNiveis['id']?>&modo=status&status=<?=$rsNiveis['status_nivel']?>">
                                                    <img src="icons/icons8-toggle-on-32.png" alt="Ativar">
                                                </a>
                                                <?php } else {?>
                                                    <a href="bd/modificarNiveis.php?codigo=<?=$rsNiveis['id']?>&modo=status&status=<?=$rsNiveis['status_nivel']?>">
                                                        <img src="icons/icons8-toggle-off-32.png" alt="Desativar">
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <div class="campo_info">
                                                <div class="opcoes_imagens">
                                                    <a href="admNiveis.php?modo=editar&codigo=<?=$rsNiveis['id'];?>">
                                                        <img src="icons/editar.png" class="imagens_opcoes">
                                                    </a>
                                                    <a onclick="return confirm('ATENÇÃO!!! Este nível pode estar associado a um ou mais usuários. Se você o excluir, estará excluindo todos os usuários associados a ele. Deseja realmente continuar?')" href="bd/modificarNiveis.php?modo=excluir&codigo=<?=$rsNiveis['id']?>">
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
            <!-- Importando rodapé -->
            <?=$footer;?>
        </div>
    </body>
</html>