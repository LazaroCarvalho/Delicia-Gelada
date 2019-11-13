<?php 

    require_once('modulos/footer.php');

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
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

        <title>Nossas Lojas - Delicia Gelada</title>
    </head>
    <body>
        
        <!-- Cabeçalho -->
        <div class="cabecalho">
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
                                <input type="hidden" name="pagina_requisicao" value="lojas">
                                <a href="cms/home.php">
                                    <input name="btnLogin" type='submit' id='botao_submit' value='OK'>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ocupa_cabecalho">
        
        </div>
        
        <!-- Apresentando a Página -->
        <section id="localize">
            <div class="conteudo center">
                <div class="center" id="localize_text">
                    <div id="localize_imagem">
                        
                    </div>
                    <div class="localize_texto">
                        <h1 id="localize_titulo">
                            Localize a loja mais próxima de você!
                        </h1>
                        <p class="localize_texto">
                            Temos lojas em diversas regiões!
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Lista de lojas -->
        <section id="lista_lojas">
            <h1 style="display: none;">a</h1>
            <div class="conteudo center">
                <div class="center" id="container_lojas">
                    <!-- Cards de cada Produto --> 
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="loja" class="card_imagens" src="imagens/lojas/loja1.jpg">
                        </div>
                        <div class="card_info center"> 
                            <p class="cards_info">Rua: Av. Rio Branco 3760 </p>
                            <p class="cards_info">Cidade: Juíz de Fora</p>
                            <p class="cards_info">Estado: Minas Gerais</p>
                            <p class="cards_info">Telefone: (011) 8577-3226</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="loja" class="card_imagens" src="imagens/lojas/loja2.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Rua: Rua Canal de Suez 337</p>
                            <p class="cards_info">Cidade: Barueri</p>
                            <p class="cards_info">Estado: São Paulo</p>
                            <p class="cards_info">Telefone: (011) 4322-3122</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="loja" class="card_imagens" src="imagens/lojas/loja3.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Rua: Rua das bananeiras 312</p>
                            <p class="cards_info">Cidade: Santana de Parnaiba</p>
                            <p class="cards_info">Estado: São Paulo</p>
                            <p class="cards_info">Telefone: (011) 8455-3232</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="loja" class="card_imagens" src="imagens/lojas/loja4.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Rua: Rua Otaviano Pisa </p>
                            <p class="cards_info">Cidade: Barueri</p>
                            <p class="cards_info">Estado: São Paulo</p>
                            <p class="cards_info">Telefone: (011) 8922-4432</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer>
            <?=$footer?>
        </footer>
        <script src="js/login.js"></script>
    </body>
</html>