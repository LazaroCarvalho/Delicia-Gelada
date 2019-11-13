<?php 

    // Verifica se houve a ação de POST pelo formulário
    if(isset($_POST['btnsalvar']))
    {
        
        require_once('conexao.php');
        $conexao = conexaoMysql();
        
        // Resgatando os dados enviados pelo formulário
        $nome = $_POST['txtnome'];
        $telefone = $_POST['txttelefone'];
        $celular = $_POST['txtcelular'];
        $email = $_POST['txtemail'];
        $homePage = $_POST['txthomepage'];
        $facebook = $_POST['txtfacebook'];
        $tipo_mensagem = $_POST['rdotipo_mensagem'];
        $mensagem = $_POST['txtmensagem'];
        $sexo = $_POST['rdosexo'];
        $profissao = $_POST['txtprofissao'];
        
        // Enviando ao banco de dados as informações contidas no formulário
        $sql = "insert into tblcontatos (nome, telefone, celular, email, home_page, facebook, tipo_mensagem, mensagem, sexo, profissao)
                values ('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$homePage."', '".$facebook."', '".$tipo_mensagem."', '".$mensagem."', '".$sexo."', '".$profissao."')";
        
        // Caso ocorra tudo normalmente, volta a pagina inicial. Se não, mostra mensagem de erro.
        echo($sql);
        if(mysqli_query($conexao, $sql))
            header('location:../contatos.php');
        else
            echo("Erro ao executar o script no banco");
        
    }

?>