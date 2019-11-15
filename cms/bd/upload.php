<?php 

    // Importando arquivos.
    require_once('../modulos/constantes.php');

    // Verificando se o apache enviou a imagem.
    if($_FILES['imagem']['size'] > 0 && $_FILES['imagem']['type'] != null)
    {

        // Pegando tamanho da imagem e convertendo em KB.
        $tamanhoImagem = $_FILES['imagem']['size'];
        $imagemSize = round($tamanhoImagem / 1024);

        // Verificando se o tamanho da imagem é adequado.
        if($imagemSize < 2000)
        {

            // Pegando a extensão do arquivo e armazenando tipos de extensões permitidas.
            $extPermitidas = array("image/png", "image/jpg", "image/jpeg");
            $extArquivo = $_FILES['imagem']['type'];

            // Verifica se a extensão do arquivo está entre as permitidas.
            if(in_array($extArquivo, $extPermitidas))
            {

                // Pega o nome da imagem e sua extensão em variáveis separadas.
                $nomeImagem = pathinfo($_FILES['imagem']['name'], PATHINFO_FILENAME);
                $extensaoImagem = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

                // Encriptografando senha.
                $senhaEncriptografada = md5(uniqid(time().$nomeImagem));
                $foto = $senhaEncriptografada.".".$extensaoImagem; 

                $diretorio = "arquivos/";
                $nomeTemp = $_FILES['imagem']['tmp_name'];
                
                // Enviando arquivo para pasta.
                if(move_uploaded_file($nomeTemp, $diretorio.$foto))
                {

                    session_start();    // Iniciando variáveis de sessão.
                    $_SESSION['imagemPreview'] = $foto;

                    echo("<img src='bd/arquivos/".$foto."' class='icon-preview'>");

                }
                else {
                    echo(ERRO_UPLOADED_FILE);
                }

            } else
                echo(ERRO_EXTENSAO_INVALIDA);

        } else 
            echo(ERRO_TAMANHO_INVALIDO);

    } else
        echo(ERRO_TAMANHO_INVALIDO);

?>