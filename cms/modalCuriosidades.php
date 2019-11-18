<?php 

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    if(!isset($_SESSION))
        session_start();

    // Verifica se esta página foi requisitada.
    if(isset($_POST['codigo']))
    {

        // Pegando o registro correspondente ao id recebido.
        $sql = "SELECT * FROM section_curiosidades WHERE id = ".$_POST['codigo'];
        $select = mysqli_query($conexao, $sql);

        // Armazenando as informações deste ID.
        while($rsConteudo = mysqli_fetch_array($select))
        {
            
            $_SESSION['codigoConteudo'] = $rsConteudo['id'];
            $_SESSION['imagemRegistro'] = $rsConteudo['imagem'];

            // Recebendo os dados do registro.
            $titulo1 = $rsConteudo['titulo_um'];
            $titulo2 = $rsConteudo['titulo_dois'];
            $texto1 = $rsConteudo['texto_um'];
            $titulo3 = $rsConteudo['titulo_tres'];
            $texto2 = $rsConteudo['texto_dois'];
            $titulo4 = $rsConteudo['titulo_quatro'];
            $texto3 = $rsConteudo['texto_tres'];
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
        <form name="frmModalConteudo" method="post" action="bd/salvarCuriosidades.php">
            <div class="cont-modal" style="background-color: <?=$corBackground?>">
                <div class="cont-titulo-modal center">
                    <input name="titulo1" class="titulo-modal txt-center center" 
                            value="<?=$titulo1?>" style="background-color: <?=$corBackground?>; color: <?=$corFont?>">
                </div>
                <div class="text-imagem-modal center">
                    <div class="imagem-modal float-left">
                        <div class="container-image-preview-curiosidades">
                            <img src="bd/arquivos/<?=$imagem?>" class="img-modal">
                        </div>
                        <div class="modal-img-preview">
                            <label for="input-image-curiosidades" id="label-preview-image-curiosidade">
                                <img class="camera-preview center" src="icons/camera-preview.png"> 
                            </label>
                        </div>
                    </div>
                    <div class="texto-modal float-left" style="background-color: <?=$corBackground?>;color: <?=$corFont?>">
                        <input value="<?=$titulo2?>" maxlength="49" name="titulo2" type="text" class="input-titulo-curiosidades" required>
                        <textarea maxlength="299" name="texto1" class="input-text-curiosidades" required><?=$texto1?></textarea>
                        <input value="<?=$titulo3?>" maxlength="49" name="titulo3" type="text" class="input-titulo-curiosidades" required>
                        <textarea maxlength="299" name="texto2" class="input-text-curiosidades" required><?=$texto2?></textarea>
                        <input value="<?=$titulo4?>" maxlength="49" name="titulo4" type="text" class="input-titulo-curiosidades">
                        <textarea maxlength="299" name="texto3" class="input-text-curiosidades" required><?=$texto3?></textarea>
                    </div>
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
        <form name="frmImagem" action="bd/upload.php" method="post" id="form-image-curiosidades" enctype="multipart/form-data">
            <input name="imagem" type="file" class="input_imagens" id="input-image-curiosidades">
        </form>
    </body>
</html>