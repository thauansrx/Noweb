<?php
    namespace SistemaEventos\Entity;
    
    class EventoEntity {
        
        //Atributos
        private $id;
        private $fk_usuario;
        private $titulo;
        private $status;
        private $descricao;
        private $data;
        private $imagem;
        
        function __construct($id, $fk_usuario, $titulo, $status, $descricao, $data, $imagem) {
            $this->id = $id;
            $this->fk_usuario = $fk_usuario;
            $this->titulo = $titulo;
            $this->status = $status;
            $this->descricao = $descricao;
            $this->data = $data;
            $this->imagem = $imagem;
        }
        
        //Getters
        
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
        
        //Setters

        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }

            return $this;
        }
        
    }
?>