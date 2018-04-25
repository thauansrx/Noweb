<?php

    namespace SistemaEventos\Controllers;

    require('./vendor/autoload.php');

    use SistemaEventos\Controllers\PainelController;
    use PHPUnit_Framework_TestCase as PHPUnit;

    class PainelControllerTest extends PHPUnit {
        /*
            Classe para testar o controller da página index
        */
        
        private $controller;
        
        function __construct() {
            $this->controller = new PainelController();
        }
        
        public function testRetornoDeTodosEventos() {
            $resultados = $this->controller->mostrarTodosEventos();
            $this->assertInternalType('array', $resultados);
        }
            
        
    }

?>