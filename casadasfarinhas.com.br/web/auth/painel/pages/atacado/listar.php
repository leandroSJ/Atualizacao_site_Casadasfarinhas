<?php 
require_once("../../../conexao.php");
$tabela = 'produtos_atacado';

$query = $pdo->query("SELECT * FROM $tabela ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
		<th>Foto</th>	
		<th class="esc">Nome</th>
		<th class="esc">EAN</th> 	 
		<th class="esc">Categoria</th> 			
		<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
	$id = $res[$i]['id'];
	$nome = $res[$i]['nome'];	
	$ean = $res[$i]['ean'];	
	$categoria = $res[$i]['categoria'];
	$foto = $res[$i]['foto'];	
	
		$query2 = $pdo->query("SELECT * FROM cat_produtos where id = '$categoria'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		if($total_reg2 > 0){
			$nome_cat = $res2[0]['nome'];
		}else{
			$nome_cat = 'Sem Referência!';
		}

echo <<<HTML
<tr>
	<td>
		<img src="img/produtos_atacado/{$foto}" width="250px" class="mr-2">		
	</td>
	<td class="esc">{$nome}</td>
	<td class="esc">{$ean}</td>	
	
	<td class="esc">{$nome_cat}</td>	
	<td>
		<a href="#" onclick="editar('{$id}', '{$nome}', '{$ean}', '{$categoria}', '{$foto}')" 
		title="Editar Dados"><i class="fa fa-edit text-primary" style="font-size:30px;"></i></a>

		<a href="#" onclick="mostrar('{$nome}', '{$ean}', '{$categoria}', '{$foto}')" 
		title="Ver Dados"><i class="fa fa-info-circle text-secondary" style="font-size:30px;"></i></a>



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
			"stateSave": true
    	});
    $('#tabela_filter label input').focus();
} );
</script>


<script type="text/javascript">
	function editar(id, nome, ean, categoria,foto){
		$('#id').val(id);
		$('#nome').val(nome);
		$('#ean').val(ean);			
		$('#categoria').val(categoria).change();							
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');

		$('#target').attr('src','img/produtos_atacado/' + foto);
	}

	function limparCampos(){
		$('#id').val('');
		$('#nome').val('');
		$('#ean').val('');			
		$('#categoria').val('');
		$('#foto').val('');
		
		$('#target').attr('src','img/produtos_atacado/sem-foto.jpg');
		
	}
</script>



<script type="text/javascript">	
	function mostrar(nome, ean, categoria, foto){

		$('#nome_dados').text(nome);
		$('#ean_dados').text(ean);		
		$('#categoria_dados').text(categoria);												
		$('#target_mostrar').attr('src','img/produtos_atacado/' + foto);

		$('#modalDados').modal('show');
	}
</script>
