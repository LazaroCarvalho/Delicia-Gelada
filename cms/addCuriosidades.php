<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Adicionar Conteúdo</title>
    </head>
    <body>
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
        <title>Bem-vindo ao CMS</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
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
                        <div class="cms_conteudo">
                            <div class="center" id="home_titulo">
                                <div class="card_cadastro_conteudo">
                                    <form name="formularioConteudo" method="post" action="bd/inserirIntroducaoConteudo.php" enctype="multipart/form-data">
                                        <h1 class="titulo_card">Título da introdução</h1>
                                        <input name="titulo" placeholder="Insira seu titulo..." type="text" class="input_titulos" maxlength="50" required>
                                        <div id="cont_input">
                                            <div id="cont_imagem">
                                                <label for="input-image">
                                                    <div id="preview-image">

                                                    </div>
                                                </label>
                                            </div>
                                            <textarea name="texto" class="input_textos" maxlength="1100" required></textarea>
                                        <div>
                                        <div id="container_color">
                                            <input type="color" name="color" required>
                                            <label>Cor de fundo da seção</label>
                                            <br>
                                            <input type="color" name="color" required>
                                            <label>Cor do texto</label>
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
                </div>
            </section>
            <!-- Importando rodapé -->
            <?=$footer;?>
        </div>
    </body>
</html>