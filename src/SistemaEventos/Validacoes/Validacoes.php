<?php

    namespace SistemaEventos\Validacoes;
    
    class Validacoes {
        
        /*
            Classe para validar informações
        */
        
        public function validarDataHora($data) { //Converte data de d/m/Y H:m:s para Y-m-d H:m:s
            
            //Convertendo data para o MySQL
            
            $dataHora = explode(" ", $data); //Data e Hora formato brasileiro
            $data = $dataHora[0]; //Data
            $hora = $dataHora[1]; //Hora
            
            $data = implode("-",array_reverse(explode("/",$data))); //Data formato americano
            $dataHora = $data.' '.$hora; //Data e hora formato americano
            return $dataHora;
        }
    }

?>