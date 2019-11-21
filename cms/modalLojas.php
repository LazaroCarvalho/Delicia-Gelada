<?php 

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();

    // Verifica se esta página foi requisitada.
    if(isset($_POST['codigo']))
    {

        // Pegando o registro correspondente ao id recebido.
        $sql = "SELECT * FROM tbllojas WHERE id = ".$_POST['codigo'];
        $select = mysqli_query($conexao, $sql);

        // Armazenando as informações deste ID.
        if($rsConteudo = mysqli_fetch_array($select))
        {
            
            $_SESSION['codigoRegistro'] = $rsConteudo['id'];
            $_SESSION['imagemRegistro'] = $rsConteudo['imagem'];

            // Recebendo os dados do registro.
            $rua = $rsConteudo['rua'];
            $cidade = $rsConteudo['cidade'];
            $estado = $rsConteudo['estado'];
            $telefone = $rsConteudo['telefone'];

        }

    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="center" id="card-lojas-cadastro">
            <form name="formularioConteudo" method="post" action="bd/addLojas.php" enctype="multipart/form-data">
                <div class="image-lojas center">
                    <label for="input-image" id="label-preview-image">
                        <img src="bd/arquivos/<?=$_SESSION['imagemRegistro']?>" class="preview-icon" id="preview-lojas-modal">
                    </label>
                </div>
                <div class="container-inputs-lojas center">
                    <input name="rua" maxlength="50" type="text" class="inputs-lojas center" placeholder="Insira sua rua" value="<?=$rua?>" required>
                    <input name="cidade" maxlength="30" type="text" class="inputs-lojas center" placeholder="Insira sua cidade" value="<?=$cidade?>" required>
                    <input name="estado" maxlength="30" type="text" class="inputs-lojas center" placeholder="Insira seu estado" value="<?=$estado?>" required>
                    <input name="telefone" maxlength="30" type="text" class="inputs-lojas center" placeholder="Insira seu telefone" value="<?=$telefone?>" required>
                </div>
                <div class="container-submit-headersobre center" id="botao-lojas-modal">
                    <input name="submitConteudo" class="submit-introducao center" id="submit-lojas" type="submit" value="Editar">
                </div>
            </form>
            <form name="frmImagem" action="bd/upload.php" method="post" id="form-image" enctype="multipart/form-data">
                <input name="imagem" type="file" class="input_imagens" id="input-image">
            </form>
        </div>
        <form name="frmImagem" action="bd/upload.php" method="post" id="form-image-header" enctype="multipart/form-data">
            <input name="imagem" type="file" class="input_imagens" id="input-image-header">
        </form>
    </body>
</html>