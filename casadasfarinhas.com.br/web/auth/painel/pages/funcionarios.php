<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

$pag = 'funcionarios';
?>

<div class="">
    <a class="btn btn-primary" class="btn btn-primary btn-flat btn-pri" onclick="inserir()"> <i class="fa fa-plus" aria-hidden="true"></i> Novo funcionário</a>
</div>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">
    
</div>


<!-- Modal Inserir-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="titulo-inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>			
            </div>            
            <form id="form" method="post">
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>    
                            </div> 	
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>    
                            </div> 	
                        </div>

                    </div>


                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" >    
                            </div> 	
                        </div>

                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">CPF</label>
                                <input type="text" class="form-control" id="cpf"  name="cpf" placeholder="CPF">    
                            </div> 	
                        </div>

                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cargo</label>
                                <select class="form-control" id="cargo" name="cargo">
                                    <?php 
                                        $query = $pdo->query("SELECT * FROM cargos where nome != 'Administrador' ORDER BY nome asc");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        $total_reg = @count($res);
                                        if($total_reg > 0){
                                            for($i=0; $i < $total_reg; $i++){
                                            foreach ($res[$i] as $key => $value){}
                                            echo '<option value="'.$res[$i]['nome'].'">'.$res[$i]['nome'].'</option>';
                                            }
                                        }else{
                                                echo '<option value="0">Cadastre um Cargo</option>';
                                            }
									 ?>

                                    
                                </select>
                            </div> 	
                        </div>

                    </div>
                                         

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua X Número 1 Bairro xxx" >    
                            </div> 	
                        </div>
                        
                    </div>                    					
                        <input type="hidden" name="id" id="id"><br>

                    <small><div id="mensagem" class="text-center"></div></small>
                </div>

                <div class="modal-footer">      
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

			</form>

		</div>
	</div>
</div>



<!-- Modal Dados-->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome-dados"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
            <div class="modal-body">
                <div class="row" style="border-bottom: 1px solid #cac7c7;">
                    
                    <div class="col-md-6">
                        <span><b>Email: </b></span>
                        <span id="email-dados"></span>
                    </div>

                    <div class="col-md-6">
                        <span><b>Senha: </b></span>
                        <span id="senha-dados"></span>
                    </div>                   
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <span><b>CPF: </b></span>
                        <span id="cpf-dados"></span>
                    </div>
                    <div class="col-md-6">
                        <span><b>Telefone: </b></span>
                        <span id="telefone-dados"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <span><b>Nivel de Acesso: </b></span>
                        <span id="nivel-dados"></span>
                    </div>
                    <div class="col-md-6">
                        <span><b>Ativo: </b></span>
                        <span id="ativo-dados"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="" alt="" width="250" id="target-mostrar">
                    </div>
                </div>

            </div>
		
		</div>
	</div>
</div>
<script type="text/javascript">
    var pag="<?=$pag?>"                
</script>
<script src="js/ajax.js"></script>