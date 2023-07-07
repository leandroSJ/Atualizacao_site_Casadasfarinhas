<?php 
require_once("../../../conexao.php");
$tabela = 'slider_receitas';

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
		<th class="esc">Título da Receita</th>		
		<th class="esc">Link da Receita</th>	
		<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
	$id = $res[$i]['id'];
	$foto = $res[$i]['foto'];
	$titulo_receitas = $res[$i]['titulo_receitas'];		
	$link_receitas = $res[$i]['link_receitas'];



echo <<<HTML
<tr>
	<td>
		<img src="img/slider_receitas/{$foto}" width="200px" class="mr-2">		
	</td>
	<td class="esc">{$titulo_receitas}</td>		
	<td class="esc">{$link_receitas}</td>

	<td>
		<a href="#" onclick="editar('{$id}', '{$titulo_receitas}', '{$link_receitas}', '{$foto}' )"><i class="fa fa-edit text-primary" style="font-size:30px;"></i></a>		

										
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
    function editar(id, titulo_receitas, link_receitas, foto){
        $('#id').val(id);
        $('#titulo_receitas').val(titulo_receitas);
	$('#link_receitas').val(link_receitas);
        $('#titulo-inserir').text(foto);		
        $('#modalForm').modal('show');
        
        $('#foto').val('');        
        $('#target').attr('src','img/slider_receitas/' + foto);
    }

	function limparCampos(){
		$('#id').val('');		
		$('#titulo_receitas').val('');		
		$('#link_receitas').val('');
		$('#foto').val('');
		
		$('#target').attr('src','img/slider_receitas/sem-foto.jpg');
		
	}
</script>
