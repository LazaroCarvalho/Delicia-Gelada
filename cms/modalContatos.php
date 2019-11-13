<?php

    // Verificando se o código do registro foi recebido.
    if(isset($_POST['codigo']))
    {

        require_once('bd/conexao.php');

        $conexao = conexaoMysql();
        $codigo = $_POST['codigo'];

        
        // Script a ser executado no banco.
        $sql = "SELECT * FROM tblcontatos WHERE id = ".$codigo; 

        $select = mysqli_query($conexao, $sql); // Inserindo Script no banco.

        if($arrayContatos = mysqli_fetch_array($select))    // Armazenando as informações trazidas do banco.
        {
            $nome = $arrayContatos['nome'];
            $telefone = $arrayContatos['telefone'];
            $celular = $arrayContatos['celular'];
            $email = $arrayContatos['email'];
            $home_page = $arrayContatos['home_page'];
            $facebook = $arrayContatos['facebook'];
            $mensagem = $arrayContatos['mensagem'];

            $tipo_mensagem = strtoupper($arrayContatos['tipo_mensagem']);

            // Substituindo o caracter do banco por Mensagem ou Sugestão.
            if($tipo_mensagem == 'S')
                $tipo_mensagem = "Sugestão";
            else
                $tipo_mensagem = "Crítica";

            // Substituindo o caracter do banco por Homem ou Mulher.
            $sexo = strtoupper($arrayContatos['sexo']);
            if($sexo == 'F')
                $sexo = "Mulher";
            else
                $sexo = "Homem";

            $profissao = $arrayContatos['profissao'];
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Modal</title>
    </head>
    <body>
        <div id="cont_dados_contato_left">
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Nome: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$nome;?>
                </div>
            </div>
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Telefone: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$telefone;?>
                </div>
            </div>
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Celular: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$celular;?>
                </div>
            </div>
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Email: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$email;?>
                </div>
            </div>
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Home Page: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$home_page;?>
                </div>
            </div>
        </div>
        <div id="cont_dados_contato_right">
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Facebook: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$facebook;?>
                </div>
            </div>
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Sexo: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$sexo;?>
                </div>
            </div>
            <div class="cont_dado_campo">
                <div class="nome_campo_contato">
                    Profissao: 
                </div>
                <div class="conteudo_campo_contato">
                    <?=$profissao;?>
                </div>
            </div>
            <div class="cont_dado_campo" id="tipo_mensagem">
                <div class="nome_campo_contato">
                    Tipo de Mensagem: 
                </div>
                <div class="conteudo_campo_contato" id="tipo_mensagem_cont">
                    <?=$tipo_mensagem;?>
                </div>
            </div>
            <div id="cont_tipmensagem">
                <div class="nome_campo_contato_tipmensagem">
                    Mensagem: 
                </div>
                <div id="mensagem_tipmensagem">
                    <?=$mensagem;?>
                </div>
            </div>
        </div>
    </body>
</html>