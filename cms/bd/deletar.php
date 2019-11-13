<?php 
    require_once('conexao.php');

    // Verificando se o código do usuário foi recebido.
    if(isset($_GET['codigo']))
    {

        $conexao = conexaoMysql();  // Conectando-se ao banco.

        $codigo = $_GET['codigo'];

        $sql = "DELETE FROM tblcontatos WHERE id = ".$codigo;   //Script para deletar registro do banco.

        // Executando script no banco. Se der certo, volta a pagina Contatos. Se não, mosta mensagem.
        if(mysqli_query($conexao, $sql))
            header('location:../admContatos.php');
        else
            echo("Erro ao deletar do banco");

    }

?>