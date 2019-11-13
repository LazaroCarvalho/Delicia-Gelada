<?php 

    //Arquivo com as funções usadas no projeto.
    // Função que busca as INFO de um ID no banco, verifica suas permissões e retorna
    // Uma estrutura HTML correspondente as permnissões de seu nível.
    function permissoesUsuario($conexaoMysql, $codigoId)
    {

        // Traz do banco as informações do ID recebido por parâmetro
        $sql = "SELECT tblniveis.* FROM tblusuarios JOIN tblniveis 
        ON tblusuarios.codnivel = tblniveis.id 
        WHERE tblusuarios.id = ".$codigoId;
        $select = mysqli_query($conexaoMysql, $sql);

        $conteudoHtml = (string) "";
        if($rsUsuario = mysqli_fetch_array($select))
        {

            // Verificando as permissões do usuário. Criando elementos HTML de acordo com as permissões.
            if($rsUsuario['adm_conteudo'] == 1)
                $conteudoHtml .= "<div class='cms_item'>
                                        <div class='cms_item_imagem'>
                                            <a href='admConteudos.php'><img alt='Compartilhar' src='imagens/compartilhando-conteudo.png' class='imagens_cms'></a>
                                        </div>
                                        <div class='cms_item_titulo'>
                                            Adm. Conteúdo
                                        </div>
                                    </div>";

            if($rsUsuario['adm_faleconosco'] == 1)
                $conteudoHtml .= "<a href='admContatos.php'>
                                        <div class='cms_item'>
                                            <div class='cms_item_imagem'>
                                                <img alt='Fale Conosco' src='imagens/socorro.png' class='imagens_cms'>
                                            </div>
                                            
                                            <div class='cms_item_titulo'>
                                                Adm. Fale Conosco
                                            </div>
                                        </div>
                                        </a>";

            if($rsUsuario['adm_usuarios'] == 1)
                $conteudoHtml .= "<a href='admUsuarios.php'>
                                        <div class='cms_item adm_usuarios'>
                                            <div class='cms_item_imagem'>
                                                <img alt='Usuarios' src='imagens/silhueta-de-usuarios-do-casal.png' class='imagens_cms'>
                                            </div>
                                            <div class='cms_item_titulo'>
                                                Adm. Usuários
                                            </div>
                                        </div>
                                    <a>";

            return $conteudoHtml;

        }

    }

?>