<?php
    namespace SistemaEventos\Controllers;
    use SistemaEventos\Models\Eventos;
    use SistemaEventos\Validacoes\Validacoes;

    class PainelController {
        
        /* 
            Controller para a página painel.php 
        */
        
        private $model;
        private $validacoes;
        
        public function __construct() {
            $this->model = new Eventos();
            $this->validacoes = new Validacoes();
        }
        
        public function mostrarTodosEventos() { //Retorna todos os eventos
            
            $eventos = $this->model->consultar();
            
            return $eventos;
        }
        
        
        // Requests
        
        public function requestCadastro($fk_usuario, $titulo, $status, $descricao, $data, $imagem) {
            
            $dataHora = $this->validacoes->validarDataHora($data); //Validando data
            
             /* Fazendo upload da imagem */

            // Extensão do arquivo
            $arqType = explode("/",$imagem['type']);
            
            if($arqType[1] == 'jpeg') {
                $arqType[1] = 'jpg';
            }

            
            // O nome do arquivo
            $arqName = $nome_final = md5(time()).'.'.$arqType[1]; //Adicionando numeros aleatório no nome do arquivo por segurança
            
            // O nome temporário do arquivo, como foi guardado no servidor
            $arqTemp = $imagem['tmp_name'];

            // O código de erro associado a este upload de arquivo
            $arqError = $imagem['error'];

            $extensoes = array('png', 'jpg', 'gif'); //Extensões permitidas


            if(in_array($arqType[1], $extensoes)) { //Verifica o tipo de arquivo

                if ($arqError == 0) { //Verifica se o upload ocorreu corretamente
                    $pasta = '../../../../../static/imagesUpload/';
                    $upload = move_uploaded_file($arqTemp, $pasta . $arqName);
                }
            
                $executou = $this->model->adicionar($fk_usuario, 
                                                    $titulo, 
                                                    $status, 
                                                    $descricao, 
                                                    $dataHora, 
                                                    $arqName);
                if($executou) {

                    return $arqName; //Retorna o nome do arquivo para exibir na pós cadastro
                }
            }
            return false;
        }
        
        
        public function requestEdicao($id, $titulo, $status, $descricao, $data, $hora) {
            
            $dataHora = $this->validacoes->validarDataHora($data); //Validando data
            
            
            return $this->model->editar($id, 
                                        $titulo, 
                                        $status, 
                                        $descricao, 
                                        $dataHora);
        }
            
    
        public function requestExclusao($id, $imagem) {
            unlink('../../../../../static/imagesUpload/'.$imagem); //Removendo imagem do servidor
            return $this->model->excluir($id);
        }
        
        
    }

?>