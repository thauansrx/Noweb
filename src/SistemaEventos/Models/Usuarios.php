<?php

    namespace SistemaEventos\Models;
    
    use SistemaEventos\Models\Conexao;

    class Usuarios extends Conexao {
        
         /* 
            Classe para a manipulação da camada model dos usuarios
        */
        
        private $conexao;
        
        function __construct() {
            /* Estabelecendo conexão com o banco de dados */
            $this->conexao = $this->conectar();
        }
        
        
        function login($usuario, $senha) { //Realiza o login do usuário
            try{
                //Preparando a query SQL
                $stmt = $this->conexao->prepare("SELECT id FROM Usuarios WHERE Login = ? AND Senha = ?");
                
                $stmt->bind_param("ss", $usuario, $senha); 
                $stmt->execute();

                $stmt->store_result();
                $stmt->bind_result($id);
                
                //Verificando se houve retorno de um usuário
                if($stmt->num_rows > 0) {
                    while ($stmt->fetch()) {
                        return $id; //Retorna o id do usuário caso ele existir no banco
                   } 
                }
                
                // Concluindo a consulta
                $stmt->close();
                
                return false;
                
            } catch(Exception $e) {
                echo 'Ops...Erro ao consultar seu usuário!!!'.PHP_EOL.$e->getMessage();
                return false;
            }
        }
    }

?>