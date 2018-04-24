<?php
    require_once '../../vendor/autoload.php';
    $componentes = new SistemaEventos\Views\Componentes(); //Componentes comum entre as páginas, por exemplo, uma navbar.
?>

<html>
    
    <head>
        <title>Acessar Sistema</title>
        <?php echo $componentes->metas(); ?>
        <?php echo $componentes->bibliotecas(); ?>
    </head>

    <body>
        <?php echo $componentes->navbar(); ?>
        
        <?php
            //Verifica se o usuário está logado para leva-lo diretamente pro painel
            if (!isset($_SESSION)) session_start(); // Se a sessão não existir, inicia uma
            if ($_SESSION['UsuarioID'] != '') header("Location: painel.php"); 
        ?>
        
        <div class="conteudo">
           
            <!-- Formulário de Login -->
            <form action="../LoginAuth/auth.php" method="post">
           
                <fieldset>
                    <legend>Dados de Login</legend>
                    <label for="txUsuario">Usuário</label>
                    <input type="text" name="usuario" id="txUsuario" maxlength="25" />
                    <label for="txSenha">Senha</label>
                    <input type="password" name="senha" id="txSenha" />

                    <input type="submit" value="Entrar" />
                </fieldset>
            </form>
        </div>
    </body>
</html>