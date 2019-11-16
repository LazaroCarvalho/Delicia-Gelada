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
        <script src="js/jquery.js"></script>
        <title>Conteúdo CMS</title>
    </head>
    <body>
        <div class="container-modal">

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
                                <img class="new-icon center" src="icons/plus.png">
                            </div>  
                            <div class="container-table center">
                                <div class="container-label">
                                    <form name="frmFiltro" method="get" action="admCuriosidades.php">
                                        <label class="label-medio float-left">Buscar por: </label>
                                        <select name="select-curiosidades" class="slc-curiosidades float-left">
                                            <option value="introducao_curiosidades" <?=$introducoesSelected?>>
                                                Introduções
                                            </option>
                                            <option value="curiosidades" <?=$curiosidadesSelected?>>
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
                                                    <a href="bd/excluirConteudo.php?codigo=<?=$rsConteudo['id']?>&tabela=<?=$nomeTabela?>&pagina=admCuriosidades.php">
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
                                                    <img class="card-opcoes-icon" src="icons/edit.png">
                                                </div>
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