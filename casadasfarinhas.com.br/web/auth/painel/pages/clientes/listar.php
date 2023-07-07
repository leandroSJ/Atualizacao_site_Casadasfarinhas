<?php 
require_once("../../../conexao.php");
$tabela = 'clientes';

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
            <th class="esc">Telefone</th>    
            <th class="esc">CPF</th>                                    
            <th class="esc">Endereço</th>
            <th class="esc">Cadastro</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>    
HTML;

for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
    $id = $res[$i]['id'];
    $nome = $res[$i]['nome'];    
    $telefone = $res[$i]['telefone'];
    $cpf = $res[$i]['cpf'];        
    $endereco = $res[$i]['endereco'];
    $data = $res[$i]['data'];

    $dataF = implode('/', array_reverse(explode('-', $data)));

echo <<< HTML
<tr class="{$classe_linha}">    
    <td>{$nome}</td>        
    <td class="">
        {$telefone}
        <a target="_blank" href="https://api.whatsapp.com/send?1=pt_BR&phone=55{$telefone}" title="Chamar no Whatsapp"> <i class="fa fa-whatsapp verde" style="font-size:25px;"></i></a>
    </td>
    <td class="esc">{$cpf}</td>    
    <td class="esc">{$endereco}</td>
    <td class="esc">{$dataF}</td>
    <td>
		<a href="#" onclick="editar('{$id}', '{$nome}', '{$email}', '{$cpf}', '{$telefone}', 
        '{$nivel}', '{$endereco}')" title="Editar Usuário" ><i class="fa fa-edit text-primary" style="font-size:25px;"></i></a>

		<a href="#" onclick="mostrar('{$nome}', '{$email}', '{$senhaF}','{$cpf}','{$telefone}',
         '{$dataF}', '{$nivel}','{$ativo}')" title="Informações do Usuário"><i class="fa fa-info-circle text-secondary" style="font-size:25px;"></i></a>        

		<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Excluir Usuário"><i class="fa fa-trash-o text-danger" style="font-size:25px;"></i></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p style="font-size: 20px;">Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')" style="font-size: 20px;"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>
		<a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i class="fa {$icone} text-success" style="font-size:25px;"></i></a>
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
    echo 'Não possui nenhum registro!!!';
}

?>

<script type="text/javascript">    
    function mostrar(nome, email, senha, cpf, telefone, dataF, nivel, ativo){
        $('#nome-dados').text(nome);
        $('#email-dados').text(email);
        $('#senha-dados').text(senha);
        $('#cpf-dados').text(cpf);
        $('#telefone-dados').text(telefone);
        $('#data-dados').text(dataF);
        $('#nivel-dados').text(nivel);
        $('#ativo-dados').text(ativo);    

        $('#modalDados').modal('show');        
    }
    function limparCampos(){
        $('#id').val('');
        $('#nome-dados').val('');
        $('#email-dados').val('');        
        $('#cpf-dados').val('');
        $('#telefone-dados').val('');        
        $('#nivel-dados').val('');        
        $('#target-mostrar').val('');
    }
</script>

<script type="text/javascript">
    function editar(id, nome, email, cpf, telefone, nivel, endereco){
        $('#id').val(id);
        $('#nome').val(nome);
        $('#email').val(email);
        $('#cpf').val(cpf);
        $('#telefone').val(telefone);
        $('#cargo').val(nivel);
        $('#endereco').val(endereco);                  
        
        $('#titulo-inserir').text('Alterar Usuário');
        $('#modalForm').modal('show');
    }

    function limparCampos(){
        $('#id').val('');
        $('#nome').val('');
        $('#cpf').val('');
        $('#telefone').val('');
        $('#endereco').val('');
    }
</script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabela').DataTable();
    } );
</script>