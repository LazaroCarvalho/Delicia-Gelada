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
            $("#input-image-headersobre").live("change", function(){

                // Envia a imagem para o upload e a insere na div de preview.
                $("#form-image-headersobre").ajaxForm({

                    target: '#label-preview-image'

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
                        <div class="cms_conteudo" id="adm-sobre">
                            <div class="container-cadastro-header center" id="container_registro_section1">
                                <form name="frmFormulario" method="post" action="bd/secaoDoisInserir.php">
                                    <div class="cont-titulo-adm center">
                                        <h1 class="center txt-center">TITULO</h1>
                                        <input name="titulo" required class="titulo-admheader" type="text" maxlength="49" placeholder="Insira seu título">
                                        <div class="modal-cortext" id="text-color">
                                            <label>Tema da fonte: </label>
                                            <select name="cor_texto">
                                                <option value="light">
                                                    Light
                                                </option>
                                                <option value="dark">
                                                    Dark
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cont-subtitulo-adm center">
                                        <h1 class="center txt-center">Texto</h1>
                                        <textarea name="texto" required class="text-admsection-um center" type="text" maxlength="299" placeholder="Insira seu subtitulo"></textarea>
                                    </div>
                                    <div class="cont-preview-img center" id="preview-img-section1">
                                        <div id="preview-image-headersobre">
                                            <label for="input-image-headersobre" id="label-preview-image">
                                                <img src='icons/photo-camera.png' class='preview-icon-headersobre'>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="container-submit-headersobre center">
                                        <input name="submitConteudo" class="submit-headersobre center" type="submit" value="Salvar">
                                    </div>
                                </form>
                                <form name="frmImagem" action="bd/upload.php" method="post" id="form-image-headersobre" enctype="multipart/form-data">
                                    <input name="imagem" type="file" class="input_imagens" id="input-image-headersobre">
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