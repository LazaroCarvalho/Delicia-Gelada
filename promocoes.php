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
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <title>Promoções - Delícia Gelada</title>
    </head>
    <body>
        
        <!-- CABEÇALHO -->
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
                                <input type="hidden" name="pagina_requisicao" value="promocoes">
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
        
        <!-- Apresentação da Página -->
        <section id="promocoes">
            <div class="conteudo center">
                <div class="center" id="promocoes_text">
                    <div id="promocoes_imagem">
                        
                    </div>
                    <div id="promocoes_texto">
                        <h1 id="promocoes_titulo">
                            PROMOÇÕES DO MÊS
                        </h1>
                        <p id="promocoes_textos">
                            Confira as nossas promoções do mês
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Lista de Produtos -->
        <section id="lista_promocoes">
            <h1 style="display:none;">a</h1>
            <div class="conteudo center">
                <div class="center" id="container_promocoes">
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="produto" class="card_imagens" src="imagens/promocoes/produto1.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Nome: Coca-Cola</p>
                            <p class="cards_info">Descrição: Refrigerante de Coca</p>
                            <p class="cards_info preco">Preço: </p>
                            <div class="cards_info preco_antigo"><p>R$ 12,00</p></div>
                            <div class="cards_info preco_atual">R$ 8,00</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="produto" class="card_imagens" src="imagens/promocoes/produto2.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Nome: Suco de Mamão Happy Day</p>
                            <p class="cards_info">Descrição: Suco de mamão</p>
                            <p class="cards_info preco">Preço:</p>
                            <div class="cards_info preco_antigo"><p>R$ 10,00</p></div>
                            <div class="cards_info preco_atual">R$ 8,00</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="produto" class="card_imagens" src="imagens/promocoes/produto3.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Nome: Suco de Uva Natural</p>
                            <p class="cards_info">Descrição: Suco Natural</p>
                            <p class="cards_info preco">Preço:</p>
                            <div class="cards_info preco_antigo"><p>R$ 6,00</p></div>
                            <div class="cards_info preco_atual">R$ 4,00</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="produto" class="card_imagens" src="imagens/promocoes/produto4.jpg">
                        </div>
                        <div class="card_info center">
                            <p class="cards_info">Nome: Suco de Laranja</p>
                            <p class="cards_info">Descrição: Suco Naturox</p>
                            <p class="cards_info preco">Preço:</p>
                            <div class="cards_info preco_antigo"><p>R$ 14,00</p></div>
                            <div class="cards_info preco_atual">R$ 10,00</div>
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