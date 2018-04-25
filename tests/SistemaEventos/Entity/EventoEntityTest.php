<?php
    namespace SistemaEventos\Entity;

    require('./vendor/autoload.php');

    use SistemaEventos\Entity\EventoEntity;
    use PHPUnit_Framework_TestCase as PHPUnit;

    class EventoEntityTest extends PHPUnit {
        /*
            Classe para testar a Entity Eventos
        */

        public function testAtributos() { //Verifica se os atributos passados na contrução da entidade estão corretos
            
            $entity = new EventoEntity(1,
                                        1,
                                        'titulo',
                                        'status',
                                        'descricao',
                                        'data',
                                        null);
            
            $this->assertEquals($entity->id, 1);
            $this->assertEquals($entity->fk_usuario, 1);
            $this->assertEquals($entity->titulo, 'titulo');
            $this->assertEquals($entity->status, 'status');
            $this->assertEquals($entity->descricao, 'descricao');
            $this->assertEquals($entity->data, 'data');
            $this->assertEquals($entity->imagem, null);
        }
    }
?>