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
                                    <form name='frmformulario' method='post' action='bd/logout.php' class='input_logout'>
                                        <input name="btnLogout" type='submit' value='Logout' class='button_logout'>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Conteúdo -->
                        <div class="cms_conteudo">
                            <div id="container_admpaginas">
                                <div class="admpagina_item">
                                    <div class="admitem_imagem">
                                        <img src="icons/orbit.png" class="icons_admconteudo">
                                    </div>
                                    <div class="admitem_titulo">
                                        <a href="admCuriosidades.php">
                                            <h2 class="adm_estilo">Administrar Curiosidades</h2>
                                            <p> Clique para editar a página</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="admpagina_item">
                                    <div class="admitem_imagem">
                                        <img src="icons/about-us.png" class="icons_admconteudo">
                                    </div>
                                    <div class="admitem_titulo">
                                        <a href="admHeaderSobre.php">
                                            <h2 class="adm_estilo">Administrar Sobre Nós</h2>
                                            <p> Clique para editar a página</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="admpagina_item">
                                    <div class="admitem_imagem">
                                    
                                    </div>
                                    <div class="admitem_titulo">
                                        <a href="#">
                                            <h2 class="adm_estilo">Administrar Lojas</h2>
                                            <p> Clique para editar a página</p>
                                        </a>
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