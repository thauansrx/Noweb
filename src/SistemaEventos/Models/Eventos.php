<?php

    namespace SistemaEventos\Models;
    use SistemaEventos\Models\Conexao;
    use SistemaEventos\Entity\EventoEntity;

    class Eventos extends Conexao {
        
        /* 
            Classe para a manipulação da camada model dos eventos
        */
        
        private $conexao;
        
        function __construct() {
            /* Estabelecendo conexão com o banco de dados */
            $this->conexao = $this->conectar();
        }
        
        
        public function adicionar($fk_usuario, $titulo, $status, $descricao, $data, $imagem=null) {
            try {
               
                //Preparando a query SQL 
                $stmt = $this->conexao->prepare("INSERT INTO Eventos 
                            (fk_Usuario, Titulo, Status, Descricao, Data, Imagem) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssss", $fk_usuario, $titulo, $status, $descricao, $data, $imagem);
    
                return $stmt->execute();    
                
            } catch(Exception $e) {
                echo 'Ops...Erro ao cadastrar evento!!!'.PHP_EOL.$e->getMessage();
            }
        }
        
        
        public function editar($id, $titulo, $status, $descricao, $data, $imagem=null) {
            try {
                
                if($imagem) {
                    
                    //Preparando a query SQL com imagem
                    $stmt = $this->conexao->prepare("UPDATE Eventos 
                            SET Titulo=?, Status=?, Descricao=?, Data=?, Imagem=? WHERE id=?");
                    $stmt->bind_param("sssssi", $titulo, $status, $descricao, $data, $imagem, $id);
                } else {
                    //Preparando a query SQL sem imagem
                    $stmt = $this->conexao->prepare("UPDATE Eventos 
                            SET Titulo=?, Status=?, Descricao=?, Data=? WHERE id=?");
                    $stmt->bind_param("ssssi", $titulo, $status, $descricao, $data, $id);
                }
                
                return $stmt->execute();
                
            } catch(Exception $e) {
                echo 'Ops...Erro ao editar evento!!!'.PHP_EOL.$e->getMessage();
            }
        }
        
        
        public function excluir($id) {
            try {
                //Preparando a query SQL
                $stmt = $this->conexao->prepare("DELETE FROM Eventos WHERE id = ?");
                $stmt->bind_param("i", $id);
                
                return $stmt->execute();
                
            } catch(Exception $e) {
                echo 'Ops...Erro ao excluir evento!!!'.PHP_EOL.$e->getMessage();
            }
        }
        
        
        public function consultar() {
            try{
                //Preparando a query SQL
                $query = "SELECT * FROM Eventos ORDER BY Data ASC" ;
                
                $eventos = array(); //Armazena os objetos eventos
                
                if ($result = $this->conexao->query($query)) {
                    while ($row = $result->fetch_row()) { //Percorrendo os resultados
                        array_push($eventos, new EventoEntity(
                            $row[0], //id
                            $row[1], //fk_Usuario
                            $row[2], //Titulo
                            $row[3], //Status
                            $row[4], //Descricao
                            $row[5], //Data
                            $row[6]  //Imagem
                        ));
                    }
                    
                    $result->close();
                }
                
                return $eventos;
                
            } catch(Exception $e) {
                echo 'Ops...Erro ao consultar eventos!!!'.PHP_EOL.$e->getMessage();
            }
        }
        
    
    }

?>