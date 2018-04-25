<?php

    namespace SistemaEventos\Models;

    require('./vendor/autoload.php');

    use SistemaEventos\Models\Usuarios;
    use PHPUnit_Framework_TestCase as PHPUnit;

    class UsuariosTest extends PHPUnit {
        
        private $model;
        
        function __construct() {
            $this->model = new Usuarios();
        }
            
        public function testLoginValido() {
            $id = $this->model->login('admin', md5('admin') ); //Retorno o ID do usuário
            $this->assertEquals(1, $id);
        }
        
        public function testLoginInvalido() {
            $id = $this->model->login('usuario_nao_existente', md5('usuario_nao_existente') ); //Retorno o ID do usuário
            $this->assertEquals(false, $id);
        }
    }
?>