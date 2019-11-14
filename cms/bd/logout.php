<?php 

    //Verifica se o usuário fez logoff.
    if(isset($_POST['btnLogout']))
    {

        // Inicia variáveis de sessão.
        if(!isset($_SESSION))
            session_start();

        // Destrói todas as variáveis de sessão e redireciona para a pagina inicial.
        session_destroy();
        header("location: ../../index.php");


    }

?>