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
        <script src="js/jquery.js"></script>
        <script src="js/jquery.form.js"></script>
        <script>
        
            $(document).ready(function (){

                // Executa quando um arquivo é selecionado na tag input.
                $("#input-image").live("change", function(){

                    $("#form-image").ajaxForm({

                        target: '#preview-image'

                    }).submit();

                });

            });

        </script>
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
                                    <input name="titulo" placeholder="Insira seu titulo..." type="text" class="input_titulos" maxlength="50" required>
                                    <div id="cont_input">
                                        <div id="cont_imagem">
                                            <div id="preview-image">

                                            </div>
                                        </div>
                                        <textarea name="texto" class="input_textos" required></textarea>
                                    <div>
                                    <div id="container_color">
                                        <input type="color" name="color" required>
                                        <label>Cor de fundo da seção</label>
                                    <div>
                                    <div class="container_submit">
                                        <input name="submitConteudo" type="submit" class="botao_cadastro" value="Salvar">
                                    </div>
                                </form>
                                <form name="frmImagem" action="bd/upload.php" method="post" id="form-image" enctype="multipart/form-data">
                                    <input name="imagem" type="file" class="input_imagens" id="input-image">
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