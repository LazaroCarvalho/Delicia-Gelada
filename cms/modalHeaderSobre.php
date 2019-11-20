<?php 

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();

    // Verifica se esta página foi requisitada.
    if(isset($_POST['codigo']))
    {

        // Pegando o registro correspondente ao id recebido.
        $sql = "SELECT * FROM header_sobre WHERE id = ".$_POST['codigo'];
        $select = mysqli_query($conexao, $sql);

        // Armazenando as informações deste ID.
        while($rsConteudo = mysqli_fetch_array($select))
        {
            
            $_SESSION['codigoRegistro'] = $rsConteudo['id'];
            $_SESSION['imagemAntiga'] = $rsConteudo['imagem'];

            // Recebendo os dados do registro.
            $titulo = $rsConteudo['titulo'];
            $subTitulo = $rsConteudo['subtitulo'];
            $imagem = $rsConteudo['imagem'];
            $cor_titulo = $rsConteudo['cor_titulo'];
            $cor_subtitulo = $rsConteudo['cor_subtitulo'];

        }

    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="cont-modal-headersobre" style="background-image: url('bd/arquivos/<?=$imagem?>')">
            <form name="frmModalConteudo" method="post" action="bd/inserirHeaderSobre.php">
                <div class="container-modalContent-sobre center">
                    <div class="options-color-header center">
                        <div class="option-title-color">
                            <input class="input-header-modal-title" name="cor_titulo" type="color" value="<?=$cor_titulo?>">
                            <label class="label-colors" style="color: <?=$cor_titulo?>">Cor do título</label>
                        </div>
                        <div class="option-title-color">
                            <input name="cor_subtitulo" type="color" value="<?=$cor_subtitulotitulo?>">
                            <label class="label-colors" style="color: <?=$cor_subtitulo?>">Cor do Subtítulo</label>
                        </div>
                    </div>
                    <div class="titulo-modal-header center" >
                        <input name="titulo" class="input-titulo-modal-header" type="text" value="<?=$titulo?>" style="color: <?=$cor_titulo?>">
                    </div>
                    <div class="subTitulo-modal-header center" style="color: <?=$cor_subtitulo?>">
                        <input name="subtitulo" class="input-subtitulo-modal-header" type="text" value="<?=$subTitulo?>" style="color: <?=$cor_subtitulo?>">
                    </div>
                    <div class="imagem-header-modal center">
                        <label for="input-image-header">
                            <img src="icons/photo-camera(1).png" class="imagem-header-modal-icon center">
                        </label>
                    </div>
                </div>
                <div class="container-submitModal center">
                    <input name="submitConteudo" type="submit" value="Editar" class="submit-introducao center">
                </div>
                <input type="hidden" name="modo" value="editar">
                
            </form>
        </div>
        <form name="frmImagem" action="bd/upload.php" method="post" id="form-image-header" enctype="multipart/form-data">
            <input name="imagem" type="file" class="input_imagens" id="input-image-header">
        </form>
    </body>
</html>