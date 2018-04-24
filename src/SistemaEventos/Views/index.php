<?php

    require_once '../../../vendor/autoload.php';

    $componentes = new SistemaEventos\Views\Componentes(); //Componentes comum entre as páginas, por exemplo, uma navbar.
    $controller = new SistemaEventos\Controllers\IndexController();
?>
<html>
    <head>
        <title>Eventos NoWeb</title>
        <?php echo $componentes->metas(); ?>
        <?php echo $componentes->bibliotecas();?>
    </head>
    <body>
        
        <!-- Navbar -->
        <?php echo $componentes->navbar(); ?>
        
        <div class="conteudo">
            <!-- Eventos -->
            <?php
                $resultados = $controller->mostrarEventosPublicos();
                if($resultados != 'Nenhum evento disponível no momento') {
                    foreach($resultados as $resultado) {
                        echo "<ul>";
                            echo "<li><h3>$resultado->titulo</h3></li>";
                            echo "<li><img src='../../../static/imagesUpload/$resultado->imagem' class='thumbnail'\"></li>";
                            echo "<li>$resultado->descricao</li>";
                            //Convertendo data para PT-BR
                            $data = date('d/m/Y H:i', strtotime($resultado->data));
                            echo "<li>$data</li>";
                        echo "</ul>";
                    }
                } else {
                    echo "<h1>$resultados</h1>";
                }
            ?>
        </div>
    </body>
</html>