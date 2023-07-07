<?php 
require_once("../../../conexao.php");
$tabela = 'slider_parceiros';

$query = $pdo->query("SELECT * FROM $tabela ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
		<th>Imagem</th>				
		<th>Nome da Imagem</th>	
		<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
	$id = $res[$i]['id'];
	$foto = $res[$i]['foto'];
		
echo <<<HTML
<tr>
	<td>
		<img src="img/slider_parceiros/{$foto}" width="200px" class="mr-2">		
	</td>
	<td class="esc">{$foto}</td>		

	<td>
		<a href="#" onclick="editar('{$id}', '{$foto}')" title="Editar Dados">
		<i class="fa fa-edit text-primary" style="font-size:30px;"></i></a>

		<a href="#" onclick="mostrar('{$id}', '{$foto}', '{$foto}')" title="Ver Dados">
		<i class="fa fa-info-circle text-secondary" style="font-size:30px;"></i></a>



		<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-trash-o text-danger" style="font-size:30px;"></i></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>			
		</td>
</tr>
HTML;

}

echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
</small>
HTML;


}else{
	echo '<small>Não possui nenhum registro Cadastrado!</small>';
}

?>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabela').DataTable({
    		"ordering": true,
			"stateSave": true
    	});
    $('#tabela_filter label input').focus();
} );
</script>


<script type="text/javascript">
	function editar(id, foto){
		$('#id').val(id);
		
		
		$('#titulo_inserir').text('Editar Registro');		
		$('#modalForm').modal('show');

		$('#foto').val('');
		$('#target').attr('src','img/slider_parceiros/' + foto);
	}

	function limparCampos(){
		$('#id').val('');		
		$('#foto').val('');		
		
		$('#target').attr('src','img/slider_parceiros/sem-foto.jpg');
		
	}
</script>



<script type="text/javascript">
	function mostrar(id, foto, foto){		
		$('#nome_dados').text(foto);		
		$('#target_mostrar').attr('src','img/slider_parceiros/' + foto);

		$('#modalDados').modal('show');
	}
</script>
