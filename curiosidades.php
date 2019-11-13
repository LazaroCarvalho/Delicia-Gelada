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
                    <div class='bkg_preto' id='caixa_login'>
                        <div class='bkg_preto' id='form_container'>
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
    
            $sql = "SELECT * FROM introducao_curiosidades WHERE id = 1";
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
        <!-- Laranja -->
        <section id="beneficios_laranja">
            <div class="conteudo center">
                <div class="titulos center">
                    <h1>Suco de laranja - Benefícios</h1>
                </div>
                <div class="container_imagemtexto center">
                    <div class="imagens" id="laranja_imagem">
                        
                    </div>
                    <div class="textos">
                        <div class="subtitulos">
                            <h2>Vitamina C</h2>
                        </div>
                        <p>
                            A vitamina C pode reduzir sintomas de gripes e resfriados, além de diminuir o estresse e combater o envelhecimento da pele.
                        </p>
                        <div class="subtitulos">
                            <h2>Ácido Fólico</h2>
                        </div>
                        <p>
                            O ácido fólico é muito usado no tratamento de anemias, além de prevenir doenças cardíacas e até mesmo o Alzheimer.
                        </p>
                        <div class="subtitulos">
                            <h2>Cabelos, unhas e pele saudáveis</h2>
                        </div>
                        <p>
                            Estimula o crescimento das unhas e dos cabelos, deixando também a pele mais brilhante e lisa.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Uva -->
        <section id="beneficios_uva">
            <div class="conteudo center">
                <div class="titulos center">
                    <h1>Suco de Uva - Benefícios</h1>
                </div>
                <div class="container_imagemtexto center">
                    <div class="imagens" id="uva_imagem">
                        
                    </div>
                    <div class="textos">
                        <div class="subtitulos">
                            <h2>Retarda o envelhecimento</h2>
                        </div>
                        <p>
                            O resveratrol age no organismo reparando as células e combatendo os radicais livres. Com isso, a substância retarda o envelhecimento da pele, além de melhorar e aumentar a expectativa de vida.
                        </p>
                        <div class="subtitulos">
                            <h2>Combate a Depressão</h2>
                        </div>
                        <p>
                            O suco de uva possui vitamina B, que afasta naturalmente o mal humor e o estresse.
                        </p>
                        <div class="subtitulos">
                            <h2>Cabelos, unhas e pele saudáveis</h2>
                        </div>
                        <p>
                            Estimula o crescimento das unhas e dos cabelos, deixando também a pele mais brilhante e lisa.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Maça -->
        <section id="beneficios_maca">
            <div class="conteudo center">
                <div class="titulos center">
                    <h1>Suco de Maça - Benefícios</h1>
                </div>
                <div class="container_imagemtexto center">
                    <div class="imagens" id="maca_imagem">
                        
                    </div>
                    <div class="textos">
                        <div class="subtitulos">
                            <h2>Protege o Coração</h2>
                        </div>
                        <p>
                            A quercetina contribui com a diminuição do acúmulo de placas de colesterol nas artérias e, por consequência, ajuda a reduzir os riscos de desenvolvimento de ataque no coração.
                        </p>
                        <div class="subtitulos">
                            <h2>Proteção aos pulmões</h2>
                        </div>
                        <p>
                            Os polifenóis podem auxiliar a apaziguar um ataque de asma. Diminui a produção das histaminas, substâncias conhecidas por causaram irritação e serem produzidas pelo organismo em resposta à presença de alergênicos.
                        </p>
                        <div class="subtitulos">
                            <h2>Fonte de potássio</h2>
                        </div>
                        <p>
                            O suco de maçã integral é uma fonte de potássio, um mineral que atua no controle da atividade elétrica do coração.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- RODA PÉ -->
        <footer>
            <?=$footer?>
        </footer>
        <script src="js/login.js"></script>
    </body>
</html>