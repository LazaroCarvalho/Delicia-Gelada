<?php 

    require_once("conexao.php");
    require_once("../modulos/constantes.php");

    $conexao = conexaoMysql();

    // Verifica se houve inserção de conteúdo.
    if(isset($_POST['submitConteudo']))
    {
        
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $corFundo = $_POST['color'];
        
        // Verifica se a imagem chegou a ser enviada pelo form.
        if($_FILES['imagem']['size'] > 0 && $_FILES['imagem']['type'] != "")
        {
            
            // Recebendo o tamanho da imagem e arredondando-o.
            $arquivoSize = $_FILES['imagem']['size'];
            $tamanhoImagem = round($arquivoSize / 1024);
            
            // Verificando se o tamanho da imagem é permitido
            if($tamanhoImagem < 2000)
            {
                // Armazenando extensões permitidas.
                $extPermitidas = array("image/jpeg", "image/jpg", "image/png");
                $extImagem = $_FILES['imagem']['type'];
                
                // Verifica se a extensão da imagem se encaixa nos padrões.
                if(in_array($extImagem, $extPermitidas))
                {
                    
                    // Separando nome e extensão da imagem.
                    $imagemNome = pathinfo($_FILES['imagem']['name'], PATHINFO_FILENAME);
                    $imagemExt = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                    
                    // Encriptografando nome da imagem.
                    $imagemNome_cripty = md5(uniqid(time().$imagemNome));
                    
                    // Concatenando nome encriptografado com a extensão.
                    $nomeFoto = $imagemNome_cripty.".".$imagemExt;
                    
                    // Recebendo o nome do arquivo no temp.
                    $diretorioTemp = $_FILES['imagem']['tmp_name'];
                    $diretorio = "arquivos/";
                    
                    if(move_uploaded_file($diretorioTemp, $diretorio.$nomeFoto))
                    {
                        
                        $sql = "INSERT INTO introducao_curiosidades 
                        (titulo, texto, imagem, cor_fundo) 
                        VALUES ('".$titulo."', '".$texto."', '".$nomeFoto."', '".$corFundo."')";
                        
                        if(mysqli_query($conexao, $sql))
                            header("location: ../introducaoCuriosidades.php");
                        else
                            echo(ERRO_EXECUCAO_SCRIPT);
                        
                    }
                    
                }
                else {
                    echo(ERRO_EXECUCAO_SCRIPT);
                }
                
            }
            else {
                echo(ERRO_EXECUCAO_SCRIPT);
            }
            
        }
        else {
            echo(ERRO_EXECUCAO_SCRIPT);
        }
        
    }

?>