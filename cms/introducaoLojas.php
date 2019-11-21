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
    $nomeTabela = "introducao_lojas";
    $introducaoSelected = (string) "";
    $lojasSelected = (string) "";

    // Verificando se as variáveis de sessão já foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    if(isset($_GET['select-curiosidades']))
    {

        $nomeTabela = $_GET['select-curiosidades']; // Recebe o tipo de conteúdo que o usuário selecionou.   

        // Verificando a opção de filtro do usuário. Serve para passar ao select do conteúdo a tabela alvo.
        switch(strtoupper($nomeTabela)){
            case "INTRODUCAO_LOJAS":
                $introducaoSelected = "selected";
                break;
            case "TBLLOJAS":
                $lojasSelected = "selected";
                break;
        }


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
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
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

                $('.fechar-modal').click(function () {

                    $('.container-opcoes').fadeOut(500);

                });

                $("#input-image").live("change", function() {

                    $("#form-image  ").ajaxForm({

                        target: '.image-lojas'

                    }).submit();

                });

            });

            // Recebe ID de um registro no banco.
            function resgatarDados(idRegistro, modal) {

                if(modal == "introducao_lojas") { // dados serão enviados para a modal da seção HEADER da página sobre nós.

                    $.ajax({

                        type: "POST",
                        url: "modalIntroducaoLojas.php",
                        data: {codigo:idRegistro},
                        success: function(dados) {
                            $('.cont-modal-conteudo').html(dados);
                        }

                    }); 

                } else if(modal == "tbllojas") {
                    
                    $.ajax({    // dados serão enviados para a modal da seção 1 da página                      sobre nós.

                        type: "POST",
                        url: "modalLojas.php",
                        data: {codigo:idRegistro},
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
            <div class="modal-lojas center">
                <div class="close-modal center">
                    <img src="icons/erro.png" class="icon-pequeno">
                </div>
                <div class="cont-modal-conteudo center" id="cont-modal-lojas">
                    
                </div>
            </div>
        </div>
        <div class="container-opcoes">
            <div class="cont-opcoes-conteudo center">
                <div class="close-modal" id="close-conteudo">
                    <img src="icons/erro.png" class="icon-pequeno fechar-modal">
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
                            Lojas
                        </h1>
                        <a href="addNewLojas.php">
                            <div class="container-opcao">
                                <div class="opcao" id="opcao-section2-sobre">
                                    <div class="linha-titulo-opcao center" id="titulo-opcao-headersobre">
                                        
                                    </div>
                                    <div class="opcao-textos-section2">
                                        <div class="texto-opcao-section2">
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
                                    <div class="icone-imagem-background" id="ic-img-bkg-section2">
                                        <img src="icons/picture.png" class="img-options-bkg">
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
                                    <form name="frmFiltro" method="get" action="introducaoLojas.php">
                                        <label class="label-medio float-left">Buscar por: </label>
                                        <select name="select-curiosidades" class="slc-curiosidades float-left">
                                            <option value="introducao_lojas" <?=$introducaoSelected?>>
                                                Introdução
                                            </option>
                                            <option value="tbllojas" <?=$lojasSelected?>>
                                                Lojas
                                            </option>
                                        </select>
                                        <input type="submit" name="submitFiltro" value="Buscar" class="btn-buscar float-left">
                                    </form>
                                </div>
                                <div class="container-cards">
                                    <?php
                                    
                                        $sql = "SELECT * FROM ".$nomeTabela;
                                        $select = mysqli_query($conexao, $sql);

                                    while($rsConteudo = mysqli_fetch_array($select))
                                    {
                                        if($nomeTabela == "introducao_lojas")
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
                                                    <a onclick="return confirm('Deseja realmente remover este conteúdo da página?')" href="bd/excluirConteudo.php?codigo=<?=$rsConteudo['id']?>&tabela=<?=$nomeTabela?>&pagina=introducaoLojas.php">
                                                        <img class="card-opcoes-icon" src="icons/error.png">
                                                    </a>
                                                </div>
                                                <div class="cont-icon">
                                                    <?php
                                                        if($rsConteudo['status'] == 1) {
                                                    ?>
                                                        <a href="bd/statusConteudoUnico.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&tabela=<?=$nomeTabela?>&pagina=introducaoLojas.php?select-curiosidades=introducao_lojas">
                                                            <img class="card-opcoes-icon" src="icons/toggle-on-48.png">
                                                        </a>
                                                    <?php } else {?>
                                                        <a href="bd/statusConteudoUnico.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&tabela=<?=$nomeTabela?>&pagina=introducaoLojas.php?select-curiosidades=introducao_lojas">
                                                            <img class="card-opcoes-icon" src="icons/toggle-off-48.png">
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="cont-icon">
                                                    <a class="btn-editar" onclick="resgatarDados(<?=$rsConteudo['id']?>, 'introducao_lojas')">
                                                        <img class="card-opcoes-icon" src="icons/edit.png">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                        <div class="cont-card" style="background-color: <?=$rsConteudo['cor_fundo']?>">
                                        <div class="card-conteudo">
                                            <div class="cont-card-conteudo">
                                                <div class="card-lojas-imagem">
                                                    <img src="bd/arquivos/<?=$rsConteudo['imagem']?>" class="image-card-lojas">
                                                </div>
                                                <div class="card-lojas-info">
                                                    <div class="info-card">
                                                        <?=$rsConteudo['rua']?>
                                                    </div>
                                                    <div class="info-card">
                                                        <?=$rsConteudo['cidade']?>
                                                    </div>
                                                    <div class="info-card">
                                                        <?=$rsConteudo['estado']?>
                                                    </div>
                                                    <div class="info-card">
                                                        <?=$rsConteudo['telefone']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-opcoes">
                                            <div class="cont-opcoes-icon">
                                                <div class="cont-icon">
                                                    <a onclick="return confirm('Deseja realmente remover este conteúdo da página?')" href="bd/excluirConteudo.php?codigo=<?=$rsConteudo['id']?>&tabela=<?=$nomeTabela?>&pagina=introducaoLojas.php?select-curiosidades=tbllojas">
                                                        <img class="card-opcoes-icon" src="icons/error.png">
                                                    </a>
                                                </div>
                                                <div class="cont-icon">
                                                    <?php
                                                        if($rsConteudo['status'] == 1) {
                                                    ?>
                                                        <a href="bd/statusLojas.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&pagina=introducaoLojas.php?select-curiosidades=tbllojas">
                                                            <img class="card-opcoes-icon" src="icons/toggle-on-48.png">
                                                        </a>
                                                    <?php } else {?>
                                                        <a href="bd/statusLojas.php?codigo=<?=$rsConteudo['id']?>&status=<?=$rsConteudo['status']?>&pagina=introducaoLojas.php?select-curiosidades=tbllojas">
                                                            <img class="card-opcoes-icon" src="icons/toggle-off-48.png">
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="cont-icon">
                                                    <a class="btn-editar" onclick="resgatarDados(<?=$rsConteudo['id']?>, 'tbllojas')">
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