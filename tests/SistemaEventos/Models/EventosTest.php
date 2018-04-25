<?php

    namespace SistemaEventos\Models;

    require('./vendor/autoload.php');

    use SistemaEventos\Models\Eventos;
    use PHPUnit_Framework_TestCase as PHPUnit;

    class EventosTest extends PHPUnit {
        
        /*
            Classe para testar o model Eventos
        */
        
        private $model;
        
        function __construct() {
            $this->model = new Eventos();
        }
        
        public function testAddDados() {
            /* É necessário concatenar 2 números aleatório no titulo, 
                pois é uma coluna única e deve ser diferente dos demais testes.
            */
            $resultado = $this->model->adicionar(1, 'titulo'.rand().rand(), 'rascunho', 'descricao', '2015-10-06 14:26:34'); 
            $this->assertEquals(true, $resultado);
        }
        
        
        public function testEditarDados() {
            /* É necessário concatenar 2 números aleatório no titulo, 
                pois é uma coluna única e deve ser diferente dos demais testes.
            */
            $resultado = $this->model->editar(1, 'titulo'.rand().rand(), 'publicado', 'descricaoEditada', '2015-10-06 20:20:20', 'imagemTeste.gif'); 
            $this->assertEquals(true, $resultado);
        }
        
        
        public function testExcluirDados() {
            $resultado = $this->model->excluir(2);
            $this->assertEquals(true, $resultado);
        }
            
        
        public function testConsultarDados() {
            $resultados = $this->model->consultar();
            $this->assertNotEmpty($resultados);
        }
        
            
    }

?>