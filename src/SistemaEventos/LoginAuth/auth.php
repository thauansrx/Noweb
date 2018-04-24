<?php
     /*
        Este arquivo faz o login do usuário no sistema
    */

    require_once '../../../vendor/autoload.php';

    $usuarios = new SistemaEventos\Models\Usuarios();
    $componentes = new SistemaEventos\Views\Componentes(); //Componentes comum entre as páginas, por exemplo, uma navbar.
?>
<html>
    <head>
        <title>Login</title>
        
        <?php echo $componentes->metas(); ?>
    </head>
    <body>
        <?php

            // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
            if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
              header("Location: index.php"); exit;
            }

            $resultado = $usuarios->login($_POST['usuario'], md5($_POST['senha'])); //Verificando a existência do usuário no banco de dados

            if($resultado) {

                // Se a sessão não existir, inicia uma
                if (!isset($_SESSION)) session_start();

                // Salva os dados encontrados na sessão
                $_SESSION['UsuarioID'] = $resultado;

                // Redireciona o visitante
                header("Location: ../Views/painel.php");
            } else {
                ?> 
                    <script>
                        alert('Usuário não existe. Verifique se as informações passadas estão corretas.');
                        location.href="../Views/login.php";
                    </script> 
                <?php
            }
        ?>
    </body>
</html>