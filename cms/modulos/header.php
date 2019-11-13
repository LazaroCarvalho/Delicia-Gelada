<?php                         

    $header = 
    "<div class='container_cabecalho_cms'>
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
            <div class='cms_item'>
                <div class='cms_item_imagem'>
                    <a href='admConteudos.php'><img alt='Compartilhar' src='imagens/compartilhando-conteudo.png' class='imagens_cms'></a>
                </div>
                <div class='cms_item_titulo'>
                    Adm. Conteúdo
                </div>
            </div>
            <a href='admContatos.php'>
                <div class='cms_item'>
                    <div class='cms_item_imagem'>
                        <img alt='Fale Conosco' src='imagens/socorro.png' class='imagens_cms'>
                    </div>
                    
                    <div class='cms_item_titulo'>
                        Adm. Fale Conosco
                    </div>
                </div>
            </a>
            <a href='admUsuarios.php'>
                <div class='cms_item adm_usuarios'>
                    <div class='cms_item_imagem'>
                        <img alt='Usuarios' src='imagens/silhueta-de-usuarios-do-casal.png' class='imagens_cms'>
                    </div>
                    <div class='cms_item_titulo'>
                        Adm. Usuários
                    </div>
                </div>
            <a>
            <div class='container_logout'>
                <p class='text_logout'>
                    Bem-Vindo, [xxxxx xxx].
                </p>
                <form name='frmformulario' method='post' action='home.php' class='input_logout'>
                    <input type='button' value='Logout' class='button_logout'>
                </form>
            </div>
        </div>
    </div>"
?>