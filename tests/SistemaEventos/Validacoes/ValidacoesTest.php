<?php

    namespace SistemaEventos\Validacoes;

    require('./vendor/autoload.php');

    use SistemaEventos\Validacoes\Validacoes;
    use PHPUnit_Framework_TestCase as PHPUnit;

    class ValidacoesTest extends PHPUnit {
        
        function testValidarDataHora() {
            $validar = new Validacoes();
            $dataHora = $validar->validarDataHora('15/12/1997 14:30');
            $this->assertEquals('1997-12-15 14:30', $dataHora);
        }
    }
?>