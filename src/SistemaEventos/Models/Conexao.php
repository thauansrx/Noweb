<?php

    namespace SistemaEventos\Models;
    use Mysqli;

    abstract class Conexao {
        
        /*
            Classe para realizar a conexão com o banco de dados
        */
        
        public function conectar($servidor = 'localhost', $usuario = 'root', $senha = '', $banco = 'Eventos') {

            // Conecta-se ao banco de dados MySQL
            $mysqli = new Mysqli($servidor, $usuario, $senha, $banco);

            $mysqli->set_charset("utf8");
            
            // Caso algo tenha dado errado, exibe uma mensagem de erro
            if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
            
            return $mysqli;
        }
        
    }

?>
