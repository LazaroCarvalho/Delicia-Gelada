<?php 
    
    // importando arquivos e conectando-se ao banco.
    require_once('modulos/header.php');
    require_once('modulos/footer.php');
    require_once('bd/conexao.php');
    require_once('modulos/funcoes.php');

    $conexao = conexaoMysql();

    // Verificando se as variáveis de sessão já foram iniciadas.
    if(!isset($_SESSION))
        session_start();

    //Chamando função do arquivo de funções. Retorna a estrutura HMTL com os itens do menu
    // Acessíveis ao usuário, de acordo com as permissões do seu nível.
    $elementoHtmlPermissoes = permissoesUsuario($conexao, $_SESSION['id_usuario']);

    $opcaoFiltro = (string) "";
    $selectTodos = (string) "";
    $selectCritica = (string) "";
    $selectSugestao = (string) "";

    if(isset($_GET['btn_filtrar'])) // Verificando se botaõ de filtro foi clicado.
    {
        $opcaoFiltro = $_GET['select_filtrar']; // Pegando a opção selecionada.
        switch($opcaoFiltro){
            case 'c':
                $selectCritica = "selected";
                break;
            case 's':
                $selectSugestao = "selected";
                break;
        }
    }
    else    // Se o botão não for clicado, todos os registros serão mostrados.
    {
        $opcaoFiltro = "todos";
        $selectTodos = "selected";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Bem-vindo ao CMS</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script>

            $(document).ready(function() {

                /* Abrir modal */
                $('.visualizar').click(function(){
                    $('#cont_modal').fadeIn(1000);
                });

                /* Fechar Modal */
                $('#fechar').click(function(){
                    $('#cont_modal').fadeOut(1000);
                });

            });

            // Função para trazer os dados de um usuário para a modal, a partir de seu ID.
            function visualizarModal(id)
            {
                $.ajax({
                    type: "POST",
                    url: "modalContatos.php",
                    data: {codigo : id},
                    success: function(dados){
                        $('#container_infocontato').html(dados);
                    }
                });
            }

        </script>
    </head>
    <body>
        <div id="cont_modal">
            <div class="center" id="modal_conteudo">
                <div id="fechar">
                    <img src="icons/erro.png">
                </div>
                <div id="cont_conteudo_modal">
                    <div class="center" id="visualizar_contato">
                        Visualizando Registro Completo
                    </div>
                    <div class="center" id="container_infocontato">

                    </div>
                </div>
            </div>
        </div>

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
                                <form name='frmformulario' method='post' action='home.php' class='input_logout'>
                                    <input type='button' value='Logout' class='button_logout'>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Conteúdo -->
                    <div class="cms_conteudo" id="contatos">
                        <div class="center" id="contatos_titulo">
                            <h1 id="cont_titulo">Consultando Contatos</h1>
                        </div>
                        <div class="center" id="container_filtro">
                            <form name="frmformulario" method="GET" action="admContatos.php">
                                <div id="opcao_filtro">
                                    Selecionar: 
                                </div>
                                <div id="lista_opcoes">
                                    <select name="select_filtrar" id="select_opcoes">
                                        <option value="todos" <?=$selectTodos?>>Exibir Todos</option>
                                        <option value="c" <?=$selectCritica?>>Críticas</option>
                                        <option value="s" <?=$selectSugestao?>>Sugestões</option>
                                    </select>
                                </div>
                                <div id="botao_filtro">
                                    <input name="btn_filtrar" type="submit" value="Filtrar" id="btn_filtro">
                                </div>
                            </form>
                        </div>
                        <div class="center" id="container_contatos">
                            <div id="cont_contatos_titulo">
                                CONTATOS
                            </div>
                            <div id="container_campos">
                                <div class="campos_contatos">
                                    Nome
                                </div>
                                <div class="campos_contatos">
                                    Email
                                </div>
                                <div class="campos_contatos">
                                    Telefone
                                </div>
                                <div class="campos_contatos">
                                    Profissão
                                </div>
                                <div class="campos_contatos">
                                    Outros
                                </div>
                            </div>      
                            <div id="container_dados_contatos">

                                <!-- Trazendo Contatos do banco e mostrando-os na tabela. -->
                                <?php

                                    $sql = "SELECT * FROM tblcontatos"; /* Script a ser lançado no banco */

                                    $select = mysqli_query($conexao, $sql); /* Recebendo o que o banco retorna */

                                    /* Trazendo os dados do select e inserindo na tabela. */
                                    while ($rsContatos = mysqli_fetch_array($select))
                                    {   
                                        if ($opcaoFiltro == "todos") { // Verificando se a Opção de fitro selecionada é mostrar todos
                                ?>

                                    <div id="cont_contato_especifico">
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['nome'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['email'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['telefone'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['profissao'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <a onclick="return confirm('Deseja realmente excluir este registro?')" href="bd/deletar.php?codigo=<?=$rsContatos['id']?>" >
                                                <div class="icon_contatos">
                                                    <img class="icon_img" src="icons/claro.png">
                                                </div>
                                            </a>
                                            <a href="#" class="visualizar" onclick="visualizarModal(<?=$rsContatos['id']?>)">
                                                <div class="icon_contatos">
                                                    <img class="icon_img" src="icons/procurar.png">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <!-- Mostrando apenas os registros que estão de acordo com o filtro -->
                                <?php } elseif ($rsContatos['tipo_mensagem'] == $opcaoFiltro){ ?>
                                    <div id="cont_contato_especifico">
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['nome'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['email'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['telefone'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <?=$rsContatos['profissao'];?>
                                        </div>
                                        <div class="campos_dados_contatos">
                                            <a onclick="return confirm('Deseja realmente excluir este registro?')" href="bd/deletar.php?codigo=<?=$rsContatos['id']?>" >
                                                <div class="icon_contatos">
                                                    <img class="icon_img" src="icons/claro.png">
                                                </div>
                                            </a>
                                            <a href="#" class="visualizar" onclick="visualizarModal(<?=$rsContatos['id']?>)">
                                                <div class="icon_contatos">
                                                    <img class="icon_img" src="icons/procurar.png">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Importando rodapé -->
        <?=$footer;?>
    </body>
</html>