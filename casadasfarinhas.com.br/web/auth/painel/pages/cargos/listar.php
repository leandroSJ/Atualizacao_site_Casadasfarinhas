<?php 
require_once("../../../conexao.php");
$tabela = 'cargos';

$query = $pdo->query("SELECT * FROM $tabela ORDER BY id asc");
$res = $query->fetchALL(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
    <small>
    <table class="table table-hover" id="tabela">
    <thead>
        <tr>            
            <th>Nome</th>                      
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>    
HTML;

for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
    $id = $res[$i]['id'];
    $nome = $res[$i]['nome']; 

echo <<< HTML
<tr>    
    <td>{$nome}</td>        
    <td>
		<a href="#" title="Editar Cargos" onclick="editar('{$id}','{$nome}')"><i class="fa fa-edit text-primary" style="font-size:25px;"></i></a>		

		<li class="dropdown head-dpdn2" style="display: inline-block;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Excluir Cargo"><i class="fa fa-trash-o text-danger" style="font-size:25px;"></i></a>

            <ul class="dropdown-menu" style="margin-left:-230px;">
                <li>
                    <div class="notification_desc2">
                        <p style="font-size: 20px;">Deseja excluir este cargo? <a href="#" onclick="excluir('{$id}')" style="font-size: 20px;"><span class="text-danger">Sim</span></a></p>
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
<small><div id="mensagem-excluir"></div></small>
</table>
</small>
HTML;


}else{
    echo "Não possui nenhum registro Cadastrado!!!";
}

?>

<script type="text/javascript">
    function editar(id, nome){
        $('#id').val(id);
        $('#nome').val(nome);
        $('#titulo-inserir').text('Alterar Cargos');
        $('#modalForm').modal('show');
    }

    function limparCampos(){
        $('#id').val('');
        $('#nome').val('');
    }
</script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabela').DataTable();
    } );
</script>