<?php 

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();

    // Verifica se esta página foi requisitada.
    if(isset($_POST['codigo']))
    {

        // Pegando o registro correspondente ao id recebido.
        $sql = "SELECT * FROM ".$_POST['tabela']." WHERE id = ".$_POST['codigo'];
        $select = mysqli_query($conexao, $sql);

        // Armazenando as informações deste ID.
        while($rsConteudo = mysqli_fetch_array($select))
        {
            
            $_SESSION['codigoConteudo'] = $rsConteudo['id'];
            $_SESSION['imagemRegistro'] = $rsConteudo['imagem'];

            // Recebendo os dados do registro.
            $titulo = $rsConteudo['titulo'];
            $texto = $rsConteudo['texto'];
            $imagem = $rsConteudo['imagem'];
            $corBackground = $rsConteudo['cor_fundo'];
            $corFont = $rsConteudo['cor_texto'];

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
        <form name="frmModalConteudo" method="post" action="bd/inserirIntroducaoConteudo.php">
            <div class="cont-modal" style="background-color: <?=$corBackground?>">
                <div class="cont-titulo-modal center">
                    <input name="titulo" class="titulo-modal txt-center center" 
                            value="<?=$titulo?>" style="background-color: <?=$corBackground?>; color: <?=$corFont?>">
                </div>
                <div class="text-imagem-modal center">
                    <div class="imagem-modal float-left">
                        <div class="container-image-preview">
                            <img src="bd/arquivos/<?=$imagem?>" class="img-modal">
                        </div>
                        <div class="modal-img-preview">
                            <label for="input-image" id="label-preview-image">
                                <img class="camera-preview center" src="icons/camera-preview.png"> 
                            </label>
                        </div>
                    </div>
                    <textarea name="texto" class="texto-modal float-left" style="background-color: <?=$corBackground?>;color: <?=$corFont?>"><?=$texto?>
                    </textarea>
                </div>
                <div class="colors-options center" style="color: <?=$corFont?>">
                    <div class="modal-cortext" id="color-background">
                        <label>Cor de fundo: </label><input name="color" value="<?=$corBackground?>" type="color">
                    </div>
                    <div class="modal-cortext" id="text-color">
                        <label>Tema da fonte: </label>
                        <select name="colorFont">
                            <option value="light">
                                Light
                            </option>
                            <option value="dark">
                                Dark
                            </option>
                        </select>
                    </div>  
                </div>
                <div class="container-submitModal center">
                    <input name="submitConteudo" type="submit" value="Editar" class="submit-introducao center">
                </div>
                <input type="hidden" name="modo" value="editar">
            </div>
        </form>
        <form name="frmImagem" action="bd/upload.php" method="post" id="form-image" enctype="multipart/form-data">
            <input name="imagem" type="file" class="input_imagens" id="input-image">
        </form>
    </body>
</html>