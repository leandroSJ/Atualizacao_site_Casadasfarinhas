<?php 
require_once("../../../conexao.php");

$tabela = 'clientes';

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$data = $_POST['data'];


//remover mascara cpf
$formata_cpf = preg_match("/^[0-a-z9\s]{1,50}$/i", $cpf);

if(!$formata_cpf){
	//retira mascara
	$cpf = str_replace(['.','-'],'', $cpf);
}

//remover mascara telefone
$formata_telefone = preg_match("/^[0-a-z9\s]{1,50}$/i", $telefone);

if(!$formata_telefone){
	$telefone = str_replace(['(',')','-', ' '],'', $telefone);
}

//validar email
$query = $pdo->query("SELECT * from $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Telefone já Cadastrado, escolha outro!!';
	exit();
}

//validar cpf
$query = $pdo->query("SELECT * from $tabela where cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'CPF já Cadastrado, escolha outro!!';
	exit();
}

if($id == ''){
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, cpf = :cpf, 
	telefone = :telefone, endereco = :endereco, data = curDate()");		
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, cpf = :cpf, 
	telefone = :telefone, endereco = :endereco, data = curDate() WHERE id = '$id'");
}


$query->bindValue(":nome", "$nome");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->execute();

echo 'Salvo com Sucesso';      
?>