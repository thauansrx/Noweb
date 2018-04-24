<?php
    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION)) session_start();
    if ($_SESSION['UsuarioID'] == '') header("Location: login.php"); //Se não estiver logado, redireciona para a página de login
    
    require_once '../../../vendor/autoload.php';

    $componentes = new SistemaEventos\Views\Componentes(); //Componentes comum entre as páginas, por exemplo, uma navbar.
    $controller = new SistemaEventos\Controllers\PainelController();
?>

<html>
    <head>
        <title>Painel do Usuário</title>
        <?php echo $componentes->metas(); ?>
        <?php echo $componentes->bibliotecas();?>
        
        <!-- Javascript -->
        <script src="../../../static/js/validacoes.js"></script>
        
            <!-- Mascara para os campos de data -->
        <script src="https://raw.githubusercontent.com/digitalBush/jquery.maskedinput/1.3.1/dist/jquery.maskedinput.min.js"></script>
        
        <script>
            $(document).ready(function(){
            	
                //Inicia a mascara para datas
                $('input[type=datetime]').mask("99/99/9999 99:99");
            });
        </script>
        
            <!-- AJAX -->
        <script>   
            function excluir(id, imagem) {
                if(confirm('Deseja excluir este registro?')) {
                    $.ajax({
                        url: 'Requests/Painel/excluir.php',
                        type: 'POST',
                        data: { id: id, imagem: imagem }
                    }).success(function(data){
                        alert("Excluido com sucesso.");
                        location.reload();
                    });   
                }
            }
            
            function editar(id) {
                var titulo = $('#titulo_'+id).val();
                var status = $('#status_'+id).val();
                var descricao = $('#descricao_'+id).val();
                var data = $('#data_'+id).val();
                
                //Verificando se foi passado todos os dados necessários
                
                if(titulo == "" || status == "" || descricao == "" || data == "") { 
                    alert('Todos os itens devem ser preenchidos para editar um registro.');
                    return false;
                }
                
                var dados = {
                    id: id,
                    titulo: titulo,
                    status: status,
                    descricao: descricao,
                    data: data
                };
                
                if(confirm('Deseja editar este registro?')) {
                    $.ajax({
                        url: 'Requests/Painel/editar.php',
                        data: dados,
                        type: 'POST'
                    }).success(function(data){
                        alert("Editado com sucesso.");
                        location.reload();
                    });  
                }
            }
        </script>
        
    </head>
    
    <body>
        <!-- Navbar -->
        <?php echo $componentes->navbar(); ?>
        
        <div class="conteudo">
            
            <!-- Cadastrar Evento -->
            <h2>Cadastrar Evento</h2>
            <form method="post" action="Requests/Painel/cadastro.php" id="cadastrar" enctype="multipart/form-data">
                <fieldset>
                    <label>Título</label>
                    <input type="text" id="titulo" name="titulo" maxlength="75" required><br><br>
                    <label>Status</label>
                    <select id="status" name="status" required>
                        <option>rascunho</option>
                        <option>publicado</option>
                    </select><br><br>
                    <label>Data do evento</label>
                    <input type="datetime" onblur="validaDat(this,this.value)" name="data" id="data" required><br><br>
                    <label>Imagem</label>
                    <input type="file" name="arquivo" id="arquivo" required/><br><br>
                    <label>Descrição</label>
                    <textarea rows="4" cols="50" id="descricao" name="descricao" maxlength="255" required></textarea><br><br>
                    <input type="submit" value="Cadastrar" id="cadastrar_evento">
                </fieldset>
            </form>
            
            <!-- Dados dos eventos -->
            <h2>Eventos Cadastrados</h2>
            <table class="table">

                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Status</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $resultados = $controller->mostrarTodosEventos();
                        foreach($resultados as $resultado) {
                            ?>
                                <tr>
                                    <td>
                                        <input type="text" maxlength="75" id="titulo_<?php echo $resultado->id; ?>" value="<?php echo $resultado->titulo; ?>"/>
                                    </td>
                                    <td>
                                        <select id="status_<?php echo $resultado->id; ?>">
                                            <?php if($resultado->status == 'rascunho') { ?>
                                                <option selected="selected">rascunho</option>
                                                <option>publicado</option>
                                            <?php } else { ?>
                                                <option>rascunho</option>
                                                <option selected="selected">publicado</option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea rows="1" cols="10" maxlength="255" id="descricao_<?php echo $resultado->id; ?>" name="descricao" maxlength="255" required><?php echo $resultado->descricao; ?></textarea>
                                    </td>
                                    <?php 
                                        //Convertendo data para PT-BR
                                        $data = date('d/m/Y H:i', strtotime($resultado->data)); 
                                    ?>
                                    <td><input type="datetime" onblur="validaDat(this,this.value)" id="data_<?php echo $resultado->id; ?>" value="<?php echo $data; ?>"></td>
                                    <td><button class="button button-small button-blue" id="editar" onclick="editar(<?php echo $resultado->id ?>)">Editar</button></td>
                                    <td><button class="button button-small button-red" id="excluir" onclick="excluir(<?php echo $resultado->id ?>, '<?php echo $resultado->imagem ?>')">Excluir</button></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>

            </table>
        </div>
    </body>
</html>