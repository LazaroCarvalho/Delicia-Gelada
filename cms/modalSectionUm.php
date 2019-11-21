<?php 

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();

    // Verifica se esta página foi requisitada.
    if(isset($_POST['codigo']))
    {

        // Pegando o registro correspondente ao id recebido.
        $sql = "SELECT * FROM sectionum_sobre WHERE id = ".$_POST['codigo'];
        $select = mysqli_query($conexao, $sql);

        // Armazenando as informações deste ID.
        while($rsConteudo = mysqli_fetch_array($select))
        {
            
            $_SESSION['codigoRegistro'] = $rsConteudo['id'];
            $_SESSION['imagemAntiga'] = $rsConteudo['imagem'];

            // Recebendo os dados do registro.
            $titulo = $rsConteudo['titulo'];
            $texto = $rsConteudo['texto'];
            $imagem = $rsConteudo['imagem'];
            $cor_font = $rsConteudo['cor_font'];

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
        <div class="cont-modal-sectionum" style="background-image: url('bd/arquivos/<?=$imagem?>')">
            <form name="frmModalConteudo" method="post" action="bd/secaoUmInserir.php">
                <div class="container-modalContent-sobre center">
                    <div class="titulo-modal-header center" >
                        <input name="titulo" class="input-titulo-modal-header" type="text" value="<?=$titulo?>" style="color: <?=$cor_font?>">
                    </div>
                    <div class="modal-text-sectionum center" style="color: <?=$cor_subtitulo?>">
                        <textarea name="texto" class="texto-modal-sectionum" style="color: <?=$cor_font?>"><?=$texto?></textarea>
                    </div>
                    <div class="option-title-color-sectionum">
                        <input class="input-header-modal-title" name="cor_font" type="color" value="<?=$cor_font?>">
                        <label class="label-colors" style="color: <?=$cor_?>">Cor do texto</label>
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