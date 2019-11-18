<?php 

    // Importando arquivos.
    require_once('modulos/footer.php');
    require_once('bd/conexao.php');
    require_once('modulos/funcoes.php');

    // Conectando-se ao banco.
    $conexao = conexaoMysql();

    // Declarando variáveis.
    // Nome da tabela na qual serão buscados, 
    // Através do SELECT no banco, os conteúdos já cadastrados
    $nomeTabela = "introducao_curiosidades";
    $introducoesSelected = (string) "";
    $curiosidadesSelected = (string) "";

    // Verificando se as variáveis de sessão já foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    if(isset($_GET['submitFiltro']))
    {

        $nomeTabela = $_GET['select-curiosidades']; // Recebe o tipo de conteúdo que o usuário selecionou.   

        if(strtoupper($_GET['select-curiosidades']) == "INTRODUCAO_CURIOSIDADES")
            $introducoesSelected = "selected";
        else
            $curiosidadesSelected = "selected";


    }

    // Retorna os elementos HTML equivalentes ao nível de permissões do usuário.
    $elementoHtmlPermissoes = permissoesUsuario($conexao, $_SESSION['id_usuario']);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <title>Conteúdo CMS</title>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.form.js"></script>
        <script>
        
            $(document).ready(function () {

                // Modal aparecerá quando um editar for clicado.
                $('.btn-editar').click(function () {

                    $('.container-modal').fadeIn(500);

                });

                // Modal fecha quando botão de fechar for clicado.
                $('.close-modal').click(function () {

                    $('.container-modal').fadeOut(500);

                });

                // Abre o menu de opções de conteúdo a serem inseridos.
                $('.add-conteudo').click(function () {

                    $('.container-opcoes').fadeIn(500);

                });

                $('#close-conteudo').click(function () {

                    $('.container-opcoes').fadeOut(500);

                });

                $("#input-image").live("change", function() {

                    $("#form-image").ajaxForm({

                        target: '.container-image-preview'

                    }).submit();

                });

                $("#input-image-curiosidades").live("change", function() {

                    $("#form-image-curiosidades").ajaxForm({

                        target: '.container-image-preview-curiosidades'

                    }).submit();

                });

            });

            // Recebe ID de um registro no banco.
            function resgatarDados(idRegistro, modal) {

                if(modal == "curiosidades") {

                    $.ajax({

                        type: "POST",
                        url: "modalCuriosidades.php",
                        data: {codigo:idRegistro},
                        success: function(dados) {
                            $('.cont-modal-conteudo').html(dados);
                        }

                    }); 

                } else {

                    $.ajax({

                        type: "POST",
                        url: "modalIntroducao.php",
                        data: {codigo:idRegistro, tabela:'introducao_curiosidades'},
                        success: function(dados) {
                            $('.cont-modal-conteudo').html(dados);
                        }

                    }); 

                }
                

            }

        </script>
    </head>
    <body>
        <div class="container-modal">
            <div class="modal center">
                <div class="close-modal">
                    <img src="icons/erro.png" class="icon-pequeno">
                </div>
                <div class="cont-modal-conteudo">
                </div>
            </div>
        </div>
        <div class="container-opcoes">
            <div class="cont-opcoes-conteudo center">
                <div class="close-modal" id="close-conteudo">
                    <img src="icons/erro.png" class="icon-pequeno">
                </div>
                <h1 class="titulo-opcoesConteudo center">Selecione um conteúdo</h1>
                <div class="cont-opcoes center">
                    <div class="titulo-opcao txt-center float-left">
                        <h1 class="opcao-title center">
                            Introdução
                        </h1>
                        <a href="addIntroducao.php">
                            <div class="container-opcao">
                                <div class="opcao">
                                    <div class="linha-titulo-opcao center">
                                    </div> 
                                    <div class="opcao-imagem float-left">
                                        <div class="image-opcao center">

                                        </div>
                                    </div>
                                    <div class="opcao-textos float-left" id="texto-opcao-introducao">
                                        <div class="texto-opcao">
                                            <div class="textos-opcao-intro">

                                            </div>
                                            <div class="textos-opcao-intro">
                                                
                                            </div>
                                            <div class="textos-opcao-intro">
                                                
                                            </div>
                                            <div class="textos-opcao-intro">
                                                
                                            </div>
                                            <div class="textos-opcao-intro">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="titulo-opcao txt-center float-left">
                        <h1 class="opcao-title center">
                            Curiosidades
                        </h1>
                        <a href="addCuriosidades.php">
                            <div class="container-opcao">
                                <div class="opcao">
                                    <div class="linha-titulo-opcao center">
                                    </div> 
                                    <div class="opcao-imagem float-left">
                                        <div class="image-opcao center">

                                        </div>
                                    </div>
                                    <div class="opcao-textos float-left">
                                        <div class="linha-grande">

                                        </div>
                                        <div class="linha-curta">

                                        </div>
                                        <div class="linha-grande">

                                        </div>
                                        <div class="linha-curta">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>  
            </div>
        </div>
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
                            <div class="novo-conteudo txt-center center">
                                <h1 class="center title-medio">Inserir novo conteúdo</h1>
                                <img class="new-icon add-conteudo center" src="icons/plus.png">
                            </div>  
                            <div class="container-table center">
                                <div class="container-label">
                                    <form name="frmFiltro" method="get" action="admCuriosidades.php">
                                        <label class="label-medio float-left">Buscar por: </label>
                                        <select name="select-curiosidades" class="slc-curiosidades float-left">
                                            <option value="introducao_curiosidades" <?=$introducoesSelected?>>
                                                Introduções
                                            </option>
                                            <option value="section_curiosidades" <?=$curiosidadesSelected?>>
                                                Curiosidades
                                            </option>
                                        </select>
                                        <input type="submit" name="submitFiltro" value="Buscar" class="btn-buscar float-left">
                                    </form>
                                <div>
                                <div class="container-cards">
                                    <?php
                                    
                                        $sql = "SELECT * FROM ".$nomeTabela;
                                        $select = mysqli_query($conexao, $sql);

                                    while($rsConteudo = mysqli_fetch_array($select))
                                    {
                                        if($nomeTabela == "introducao_curiosidades")
                                        {
                                    ?>
                                        <div class="cont-card" style="background-color: <?=$rsConteudo['cor_fundo']?>">
                                            <div class="card-conteudo">
                                                <h1 class="card-title txt-center" style="color: <?=$rsConteudo['cor_texto']?>"><?=$rsConteudo['titulo']?></h1>
                                                <div class="cont-card-conteudo">
                                                    <div class="cont-card-img">
                                                        <img src="bd/arquivos/<?=$rsConteudo['imagem']?>" class="card-img">
                                                    </div>
                                                    <div class="card-text" style="color: <?=$rsConteudo['cor_texto']?>">
                                                        <?=$rsConteudo['texto']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-opcoes">
                                                <div class="cont-opcoes-icon">
                                                    <div class="cont-icon">
                                                        <a onclick="return confirm('Deseja realmente remover este conteúdo da página?')" href="bd/excluirConteudo.php?codigo=<?=$rsConteudo['id']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php">
                                                            <img class="card-opcoes-icon" src="icons/error.png">
                                                        </a>
                                                    </div>
                                                    <div class="cont-icon">
                                                        <?php
                                                            if($rsConteudo['status'] == 1) {
                                                        ?>
                                                            <a href="bd/statusConteudoUnico.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php">
                                                                <img class="card-opcoes-icon" src="icons/toggle-on-48.png">
                                                            <a>
                                                        <?php } else {?>
                                                            <a href="bd/statusConteudoUnico.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php">
                                                                <img class="card-opcoes-icon" src="icons/toggle-off-48.png">
                                                            <a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="cont-icon">
                                                        <a class="btn-editar" onclick="resgatarDados(<?=$rsConteudo['id']?>)">
                                                            <img class="card-opcoes-icon" src="icons/edit.png">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="cont-card-curiosidades" style="background-color: <?=$rsConteudo['cor_fundo']?>">
                                            <div class="card-conteudo-curiosidades">
                                                <h1 class="card-title txt-center over-hidden" style="color: <?=$rsConteudo['cor_texto']?>"><?=$rsConteudo['titulo_um']?></h1>
                                                <div class="cont-card-conteudo-curiosidades">
                                                    <div class="cont-card-img-curiosidades">
                                                        <img src="bd/arquivos/<?=$rsConteudo['imagem']?>" class="card-img-curiosidades">
                                                    </div>
                                                    <div class="card-text-curiosidades" style="color: <?=$rsConteudo['cor_texto']?>">
                                                        <div class="titulo-text-curiosidades over-hidden">
                                                            <?=$rsConteudo['titulo_dois']?>
                                                        </div>
                                                        <div class="texto-curiosidades-card over-hidden">
                                                            <?=$rsConteudo['texto_um']?>
                                                        </div>
                                                        <div class="titulo-text-curiosidades over-hidden">
                                                            <?=$rsConteudo['titulo_tres']?>    
                                                        </div>
                                                        <div class="texto-curiosidades-card over-hidden">
                                                            <?=$rsConteudo['texto_dois']?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-opcoes-curiosidades">
                                                <div class="cont-opcoes-icon-curiosidades">
                                                    <div class="cont-icon">
                                                        <a onclick="return confirm('Deseja realmente remover este conteúdo da página?')" href="bd/excluirConteudo.php?codigo=<?=$rsConteudo['id']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php?">
                                                            <img class="card-opcoes-icon" src="icons/error.png">
                                                        </a>
                                                    </div>
                                                    <div class="cont-icon">
                                                        <?php
                                                            if($rsConteudo['status'] == 1) {
                                                        ?>
                                                            <a href="bd/status.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php">
                                                                <img class="card-opcoes-icon" src="icons/toggle-on-48.png">
                                                            <a>
                                                        <?php } else {?>
                                                            <a href="bd/status.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php?">
                                                                <img class="card-opcoes-icon" src="icons/toggle-off-48.png">
                                                            <a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="cont-icon">
                                                        <a class="btn-editar" onclick="resgatarDados(<?=$rsConteudo['id']?>, 'curiosidades')">
                                                            <img class="card-opcoes-icon" src="icons/edit.png">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } } ?>
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