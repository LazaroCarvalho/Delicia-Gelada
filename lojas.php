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
                    <div class='bkg_laranja' id='caixa_login'>
                        <div class='bkg_laranja' id='form_container'>
                            <form name='frmformulario' method='post' action='cms/bd/autenticacao.php'>
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
        <?php 
            
            $sql = "SELECT * FROM introducao_lojas WHERE status = 1";
            $select = mysqli_query($conexao, $sql);

            if($rsConteudo = mysqli_fetch_array($select))
            {
        ?>
        <section id="localize" style="background-color: <?=$rsConteudo['cor_fundo']?>">
            <div class="conteudo center">
                <div class="center" id="localize_text">
                    <div id="localize_imagem" style="background-image: url('cms/bd/arquivos/<?=$rsConteudo['imagem']?>')">
                        
                    </div>
                    <div class="localize_texto">
                        <h1 id="localize_titulo">
                            <?=$rsConteudo['titulo']?>
                        </h1>
                        <p class="localize_texto">
                            <?=$rsConteudo['texto']?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        
        <!-- Lista de lojas -->
        <section id="lista_lojas">
            <h1 style="display: none;">a</h1>
            <div class="conteudo center">
                <div class="center" id="container_lojas">
                    <!-- Cards de cada Produto -->
                    <?php 
                        $sql = "SELECT * FROM tbllojas WHERE status = 1";
                        $select = mysqli_query($conexao, $sql);
                    
                        while ($rsConteudo = mysqli_fetch_array($select))
                        {
                    ?>
                    <div class="card">
                        <div class="card_imagem center">
                            <img alt="loja" class="card_imagens" src="cms/bd/arquivos/<?=$rsConteudo['imagem']?>">
                        </div>
                        <div class="card_info center"> 
                            <p class="cards_info"><?=$rsConteudo['rua']?></p>
                            <p class="cards_info"><?=$rsConteudo['cidade']?></p>
                            <p class="cards_info"><?=$rsConteudo['estado']?></p>
                            <p class="cards_info"><?=$rsConteudo['telefone']?></p>
                        </div>
                    </div>
                    <?php } ?>
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