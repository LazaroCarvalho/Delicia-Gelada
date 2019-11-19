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

    $titulo = (string) "";
    $subtitulo = (string) "";
    $imagem = (string) "<img src='icons/photo-camera.png' class='preview-icon-headersobre'>";
    $corTitulo = (string) "";
    $corSubtitulo = (string) "";
    $valorBotao = (string) "Salvar";

    // Verificando se esta página foi requisitada.
    if(isset($_GET['codigo']))
    {

        // Verificando se o modo é edição
        if(strtoupper($_GET['modo']) == "EDITAR")
        {

            // Executando SCRIPT para buscar o registro selecionado.
            $sql = "SELECT * FROM header_sobre WHERE id = ".$_GET['codigo'];
            $select = mysqli_query($conexao, $sql);

            if($rsConteudo = mysqli_fetch_array($select))
            {

                // Criando variáveis de sessão.
                $_SESSION['imagemAntiga'] = $rsConteudo['imagem'];
                $_SESSION['codigoRegistro'] = $rsConteudo['id'];

                // Pegando as informações do registro.
                $titulo = $rsConteudo['titulo'];
                $subtitulo = $rsConteudo['subtitulo'];
                $corTitulo = $rsConteudo['cor_titulo'];
                $corSubtitulo = $rsConteudo['cor_subtitulo'];
                $imagem = "<img src='bd/arquivos/".$rsConteudo['imagem']."' class='preview-icon-headersobre'>";
                $valorBotao = "Editar";

            }

        }

    }

    
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
                            <div class="container_menu">
                                <ul class="menu">
                                    <a href="admHeaderSobre.php">
                                        <li class="menu_itens">
                                            Cabeçalho
                                        </li>
                                    </a>
                                    <a href="secaoUmSobre.php">
                                        <li class="menu_itens">
                                            Seção 1
                                        </li>
                                    </a>
                                    <a href="secaoDoisSobre.php">
                                        <li class="menu_itens">
                                            Seção 2
                                        </li>
                                    </a>
                                </ul>
                            </div>
                            <div class="container-cadastro-header center">
                                <form name="frmFormulario" method="post" action="bd/inserirHeaderSobre.php">
                                    <div class="cont-titulo-adm center">
                                        <h1 class="center txt-center">TITULO</h1>
                                        <input name="titulo" value="<?=$titulo?>" required class="titulo-admheader" type="text" maxlength="49" placeholder="Insira seu título">
                                        <input type="color" value="<?=$corTitulo?>" name="colorTitulo"><label>Cor da fonte do título</label>
                                    </div>
                                    <div class="cont-subtitulo-adm center">
                                        <h1 class="center txt-center">Subtitulo</h1>
                                        <input name="subtitulo" value="<?=$subtitulo?>" required class="subtitulo-admheader center" type="text" maxlength="49" placeholder="Insira seu subtitulo">
                                        <input type="color" value="<?=$corSubtitulo?>" name="colorSubtitulo"><label>Cor da fonte do subtítulo</label>
                                    </div>
                                    <div class="cont-preview-img center">
                                        <div id="preview-image-headersobre">
                                            <label for="input-image-headersobre" id="label-preview-image">
                                                <?=$imagem?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="container-submit-headersobre center">
                                        <input name="submit-header" class="submit-headersobre center" type="submit" value="<?=$valorBotao?>">
                                    </div>
                                </form>
                                <form name="frmImagem" action="bd/upload.php" method="post" id="form-image-headersobre" enctype="multipart/form-data">
                                    <input name="imagem" type="file" class="input_imagens" id="input-image-headersobre">
                                </form>
                            </div>
                            <div id="container_usuarios_cadastrados_header">
                                <div class="center crud-headerSobre" id="tabela_usuarios_cadastrados-header">
                                    <div class="titulo_cadastrados">
                                        Cabeçalhos cadastrados
                                    </div>
                                    <div class="cont_cedulas_tabela">
                                        <div class="nome_cedula">
                                            Imagem
                                        </div>
                                        <div class="nome_cedula">
                                            Titulo
                                        </div>
                                        <div class="nome_cedula">
                                            Subtitulo
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
                                        $sql = "SELECT * FROM header_sobre";
                                        $select = mysqli_query($conexao, $sql);

                                        $contador = 0;

                                        while($rsConteudos = mysqli_fetch_array($select))
                                        {
                                            $contador++;

                                            // Utilizando uma variável contadora para "zebrar" as linhas da tabela.
                                            if($contador % 2 == 0)
                                                $corLinha = "listra_branca";
                                            else
                                                $corLinha = "listra_negra";

                                    ?>
                                    <div class="container_dados_campo <?=$corLinha?>">
                                        <div class="campo_info campo-imageCrud">
                                            <img src="bd/arquivos/<?=$rsConteudos['imagem']?>" class="image-crud">
                                        </div>
                                        <div class="campo_info">
                                            <?=$rsConteudos['titulo']?>
                                        </div>
                                        <div class="campo_info">
                                            <?=$rsConteudos['subtitulo']?>
                                        </div>
                                        <div class="campo_info">
                                        <!-- Verificando o status e exibindo o ícone adequado (Ativado/Desativado) -->
                                        <?php if($rsConteudos['status'] == 1){ ?>
                                            <a href="bd/statusHeader.php?codigo=<?=$rsConteudos['id']?>&modo=status&status=<?=$rsConteudos['status']?>">
                                                <img src="icons/icons8-toggle-on-32.png" alt="Ativar">
                                            </a>
                                        
                                        <?php } else{ ?>
                                            <a href="bd/statusHeader.php?codigo=<?=$rsConteudos['id']?>&modo=status&status=<?=$rsConteudos['status']?>">
                                                <img src="icons/icons8-toggle-off-32.png" alt="Desativar">
                                            </a>
                                        <?php } ?>
                                        </div>
                                        <div class="campo_info">
                                            <div class="opcoes_imagens">
                                                <a href="admHeaderSobre.php?modo=editar&codigo=<?=$rsConteudos['id'];?>">
                                                    <img src="icons/editar.png" class="imagens_opcoes">
                                                </a>
                                                <a onclick="return confirm('Você realmente deseja excluir este registro?');" href="bd/excluirConteudo.php?codigo=<?=$rsConteudos['id']?>&tabela=header_sobre&pagina=secaoUmSobre.php">
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
            </section>
            <!-- Importando rodapé -->
            <?=$footer;?>
        </div>
    </body>
</html>