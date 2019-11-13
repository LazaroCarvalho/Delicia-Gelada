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

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <title>Conteúdo CMS</title>
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
                        <div class="cms_conteudo" id="adm_curiosidades">
                            <div class="container_menu menu_curiosidades">
                                <ul class="menu">
                                    <a href="introducaoCuriosidades.php">
                                        <li class="menu_itens">
                                            Inserir Introdução
                                        </li>
                                    </a>
                                    <a href="admUsuarios.php">
                                        <li class="menu_itens">
                                            Inserir Seções
                                        </li>
                                    </a>
                                </ul>
                            </div>
                            <div class="card_cadastro_conteudo">
                                <form name="formularioConteudo" method="post" action="bd/inserirIntroducaoConteudo.php" enctype="multipart/form-data">
                                    <h1 class="titulo_card">Título da introdução</h1>
                                    <input name="titulo" placeholder="Insira seu titulo..." type="text" class="input_titulos" maxlength="50">
                                    <div id="cont_imagem">
                                        <h3 class="imagem_titulo">Escolha sua imagem</h3>
                                        <input name="imagem" type="file" class="input_imagens">
                                    </div>
                                    <textarea name="texto" class="input_textos"></textarea>
                                    <div class="select_color">
                                        <label>Cor de fundo:</label><input name="color" type="color">
                                    </div>
                                    <input name="submitConteudo" type="submit" class="botao_cadastro" value="Inserir Introdução">
                                </form>
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