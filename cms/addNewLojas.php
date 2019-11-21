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
        <script src="js/jquery.js"></script>
        <script src="js/jquery.form.js"></script>
        <script>
        
        $(document).ready(function (){

            // Executa quando um arquivo é selecionado na tag input.
            $("#input-image").live("change", function(){

                // Envia a imagem para o upload e a insere na div de preview.
                $("#form-image").ajaxForm({

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
                        <div class="cms_conteudo" id="introducaoConteudo">
                            <div class="card_cadastro_conteudo center" id="cadastro_lojas">
                                <form name="formularioConteudo" method="post" action="bd/addLojas.php" enctype="multipart/form-data">
                                    <div class="image-lojas center">
                                        <label for="input-image" id="label-preview-image">
                                            <img src="icons/photo-camera.png" class="preview-icon" id="preview-lojas">
                                        </label>
                                    </div>
                                    <div class="container-inputs-lojas center">
                                        <input name="rua" maxlength="50" type="text" class="inputs-lojas center" placeholder="Insira sua rua" required>
                                        <input name="cidade" maxlength="30" type="text" class="inputs-lojas center" placeholder="Insira sua cidade" required>
                                        <input name="estado" maxlength="30" type="text" class="inputs-lojas center" placeholder="Insira seu estado" required>
                                        <input name="telefone" maxlength="30" type="text" class="inputs-lojas center" placeholder="Insira seu telefone" required>
                                    </div>
                                    <div class="container-submit-headersobre center">
                                        <input name="submitConteudo" class="submit-introducao center" id="submit-lojas" type="submit" value="Salvar">
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