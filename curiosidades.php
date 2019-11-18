<?php 

    require_once('modulos/footer.php');
    require_once('cms/bd/conexao.php');

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
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <title>Delícia Gelada - Curiosidades</title>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-1.7.2.min.js"></script>
        <style>
            
            body {
                font-family: 'Muli', sans-serif;
                color: white;
            }
            
        </style>
    </head>
    <body>
        
        <!-- CABEÇALHO -->
        <header class="cabecalho">
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
                    <div class='bkg_laranja' id='caixa_login'>
                        <div class='bkg_laranja' id='form_container'>
                            <form name='frmformulario' method='post' action='bd/autenticacao.php'>
                                <div class='form_login'>
                                    Usuario: <br>
                                    <input name="usuario" type='text' class='input_form_login'>
                                </div>
                                <div class='form_login'>
                                    Senha: <br>
                                    <input name="senha" type='password' class='input_form_login'>
                                </div>
                                <input type="hidden" name="pagina_requisicao" value="curiosidades">
                                <a href="cms/home.php">
                                    <input name="btnLogin" type='submit' id='botao_submit' value='OK'>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="ocupa_cabecalho">
            
        </div>
        
        <!-- Beneficios do suco à saúde -->
        <?php
    
            $sql = "SELECT * FROM introducao_curiosidades WHERE status = 1";
            $select = mysqli_query($conexao, $sql);
            
            if($rsConteudo = mysqli_fetch_array($select))
            {
        ?>
        <section id="beneficios_saude" style="background-color: <?=$rsConteudo['cor_fundo']?>">
            <div class="conteudo center">
                <div class="titulos center">
                    <h2><?=$rsConteudo['titulo']?></h2>
                </div>
                <div class="container_imagemtexto center">
                    <div class="imagens">
                        <img src="cms/bd/arquivos/<?=$rsConteudo['imagem']?>" class="imagem_curiosidades">
                    </div>
                    <div class="textos">
                        <?=$rsConteudo['texto']?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        
        <!-- Benefícios de cada Suco -->
        <?php

            $sql = "SELECT * FROM section_curiosidades WHERE status = 1";
            $select = mysqli_query($conexao, $sql);

            while($rsConteudo = mysqli_fetch_array($select))
            {
        ?>
            <section id="beneficios" style="background-color: <?=$rsConteudo['cor_fundo']?>">
                <div class="conteudo center" id="conteudos-curiosidades">
                    <div class="titulos center" style="color: <?=$rsConteudo['cor_texto']?>">
                        <h1><?=$rsConteudo['titulo_um']?></h1>
                    </div>
                    <div class="container_imagemtexto center">
                        <div class="imagens">
                            <img src="cms/bd/arquivos/<?=$rsConteudo['imagem']?>" class="imagens">
                        </div>
                        <div class="textos">
                            <div class="subtitulos" style="color: <?=$rsConteudo['cor_texto']?>">
                                <h2><?=$rsConteudo['titulo_dois']?></h2>
                            </div>
                            <p style="color: <?=$rsConteudo['cor_texto']?>">
                                <?=$rsConteudo['texto_um']?></h2>
                            </p>
                            <div class="subtitulos" style="color: <?=$rsConteudo['cor_texto']?>">
                                <h2><?=$rsConteudo['titulo_tres']?></h2>
                            </div>
                            <p style="color: <?=$rsConteudo['cor_texto']?>">
                                <?=$rsConteudo['texto_dois']?>
                            </p>
                            <div class="subtitulos" style="color: <?=$rsConteudo['cor_texto']?>">
                                <h2><?=$rsConteudo['titulo_quatro']?></h2>
                            </div>
                            <p style="color: <?=$rsConteudo['cor_texto']?>">
                                <?=$rsConteudo['texto_tres']?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- RODA PÉ -->
        <footer>
            <?=$footer?>
        </footer>
        <script src="js/login.js"></script>
    </body>
</html>