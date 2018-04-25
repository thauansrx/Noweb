<?php

    namespace SistemaEventos\Controllers;

    require('./vendor/autoload.php');

    use SistemaEventos\Controllers\IndexController;
    use PHPUnit_Framework_TestCase as PHPUnit;

    class IndexControllerTest extends PHPUnit {
        /*
            Classe para testar o controller da página index
        */
        
        public function testRetornoDeEventosPublicos() {
            $controller = new IndexController();
            $resultados = $controller->mostrarEventosPublicos();
            if($resultados != 'Nenhum evento disponível no momento') {
                $this->assertInternalType('array', $resultados);
            } 
        }
    }

?>