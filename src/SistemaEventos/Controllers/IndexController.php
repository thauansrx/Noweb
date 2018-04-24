<?php
    namespace SistemaEventos\Controllers;
    use SistemaEventos\Models\Eventos;

    class IndexController {
        

        /* 
            Controller para a página index.php 
        */
        
        public function mostrarEventosPublicos() { //Retorna os eventos que podem ser visto pelo publico
            $model = new Eventos();
            $eventos = $model->consultar();
            
            $resultados = array(); //Armazena o resultado que deve ser retornado para a view
            
            //Verificando o status do evento e se ele já ocorreu
            date_default_timezone_set('America/Sao_Paulo');

            
            $dataAtual = strtotime(date('Y-m-d H:i:s')); //Pegando data atual e convertendo para timestamp
            
            foreach($eventos as $evento) { 
                if($dataAtual < strtotime($evento->data) and strtolower($evento->status) == 'publicado') {
                    array_push($resultados, $evento);
                }
            }
            
            if(empty($resultados)) {
                return 'Nenhum evento disponível no momento';
            }
            
            return $resultados;
        }
    }

?>