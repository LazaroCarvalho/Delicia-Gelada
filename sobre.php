<?php 

    require_once('bd/conexao.php');
    require_once('modulos/footer.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();
        
    // Caso ocorra um erro, mostra a mensagem de erro e destrói a variável de sessão.
    if(isset($_SESSION['falha_autenticacao'])){

        echo("<script>alert('".$_SESSION['falha_autenticacao']."');</script>");
        unset($_SESSION['falha_autenticacao']);

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js'></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/header.js"></script>    
        <title>Delícia Gelada - Sobre nós</title>
    </head>
    <body>
        
        <!-- CABEÇALHO -->
        <header class="cabecalho bkg_transparente" id="cabeca">
            <div class='conteudo center'>
                <div id='caixa_logo'>

                </div>

                <!-- MENU -->
                <nav id='caixa_menu'>
                    <ul id='menu' class='center'>
                        <li class='menu_itens'><a href='index.php'>Home</a></li>
                        <li class='menu_itens'><a href='curiosidades.php'>Curiosidades</a></li>
                        <li class='menu_itens'>
                            <a href='sobre.php'>Sobre nós</a>
                        </li>
                        <li class='menu_itens'>
                            <a href='lojas.php'>Lojas</a>
                        </li>
                        <li class='menu_itens'>
                            <a href='promocoes.php'>Promoções</a>
                        </li>
                        <li class='menu_itens'>
                            <a href='contatos.php'>Contatos</a>
                        </li>
                        <li class='menu_itens'>
                            <a href='destaques.php'>Destaques</a>
                        </li>
                    </ul>
                </nav>

                <!-- Formulário de login -->
                    <div id='container_login'>
                    <div id='login_txt'>
                        Login 
                        <div id="seta_branca">
                            <img alt="seta" src="icons/sobre/arrow-24-16.png" >
                        </div>
                    </div>
                    <div class='bkg_preto' id='caixa_login'>
                        <div class='bkg_preto' id='form_container'>
                            <form name='frmformulario' method='post' action='cms/bd/autenticacao.php'>
                                <div class='form_login'>
                                    Usuario: <br>
                                    <input name="usuario" type='text' class='input_form_login'>
                                </div>
                                <div class='form_login'>
                                    Senha: <br>
                                    <input name="senha" type='password' class='input_form_login'>
                                </div>
                                <input type="hidden" name="pagina_requisicao" value="sobre">
                                <a href="cms/home.php">
                                    <input name="btnLogin" type='submit' id='botao_submit' value='OK'>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <?php 
        
            $sql = "SELECT * FROM header_sobre WHERE status = 1";
            $select = mysqli_query($conexao, $sql);

            while($rsConteudo = mysqli_fetch_array($select))
            {
        ?>
        <section id="sobre_nos" style="background-image: url('cms/bd/arquivos/<?=$rsConteudo['imagem']?>');">
            <div id="vidro">
                <div class="conteudo center">
                    <div class="titulo_sobre center" style="color: <?=$rsConteudo['cor_titulo']?>" id="nome_site">
                        <h1><?=$rsConteudo['titulo']?></h1>
                    </div>
                    <div class="titulo_sobre center" style="color: <?=$rsConteudo['cor_subtitulo']?>" id="titulo_sobre_2">
                        <h2><?=$rsConteudo['subtitulo']?></h2>
                    </div>
                    <div id="buttom_seta" class="center">
                        <a href="#safras" class="ancora">
                            <img alt="seta" src="icons/sobre/play-button.png">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        
        <!-- Qualidades da empresa -->
        <?php
            $sql = "SELECT * FROM sectionum_sobre WHERE status = 1";
            $select = mysqli_query($conexao, $sql);

            if($rsConteudo = mysqli_fetch_array($select))
        ?>
            <section id="safras" style="background-image: url('cms/bd/arquivos/<?=$rsConteudo['imagem']?>')">
                <div id="safras_pelicula">
                    <div class="conteudo center">
                        <div class="sobre_titulos center" style="color: <?=$rsConteudo['cor_font']?>">
                            <h1><?=$rsConteudo['titulo']?></h1>
                        </div>
                        <div class="sobre_textos center">
                            <p><?=$rsConteudo['texto']?></p>
                        </div>
                    </div>
                </div>
            </section>
        
        <!-- Alcance da Empresa -->
        <?php 
            $sql = "SELECT * FROM sectiondois_sobre WHERE status = 1";
            $select = mysqli_query($conexao, $sql);
            
            if($rsConteudo = mysqli_fetch_array($select))
            {
        ?>
            <section id="alcance">
                <div class="conteudo center">
                    <div id="alcance_imagem">
                        <img src="cms/bd/arquivos/<?=$rsConteudo['imagem']?>" class="alcance_img">
                    </div>
                    <div id="alcance_titulo" style="color: <?=$rsConteudo['cor_texto']?>">
                        <h1 id="alcance_titulo_form"><?=$rsConteudo['titulo']?></h1>
                        <p id="alcance_text_form"><?=$rsConteudo['texto']?></p>
                    </div>
                </div>
            </section>
        <?php } ?>
        
        <!-- RODA-PÉ -->
        <footer>
            <?=$footer?>
        </footer>
        <script src="js/login.js"></script>
        
        <!-- Script para animação da Âncora, ao clicar na seta da imagem principal. -->
        <script>
            jQuery(document).ready(function($) {
                $(".ancora").click(function(event){       
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
                });
            });
        </script>
    </body>
</html>