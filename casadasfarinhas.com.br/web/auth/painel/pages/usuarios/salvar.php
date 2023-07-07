<?php 
require_once("../../../conexao.php");

$tabela = 'usuarios';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$cargo = $_POST['cargo'];
$endereco = $_POST['endereco'];
$senha = '123';
$password_hash = password_hash($senha, PASSWORD_DEFAULT);

if($cargo == 0){
    echo 'Cadastre um cargo para criar um usuário !';
	exit();
}

//remover mascara cpf
$formata_cpf = preg_match("/^[0-a-z9\s]{1,50}$/i", $cpf);

if(!$formata_cpf){
	//retira mascara
	$cpf = str_replace(['.','-'],'', $cpf);
}

//remover mascara telefone
$formata_telefone = preg_match("/^[0-a-z9\s]{1,50}$/i", $telefone);

if(!$formata_telefone){
	//retira mascara
	$telefone = str_replace(['(',')','-', ' '],'', $telefone);
}

//validar email
$query = $pdo->query("SELECT * from $tabela where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Email já Cadastrado, escolha outro!!';
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
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, email = :email,
	cpf = :cpf, telefone = :telefone, senha = '$senha', senha_crip = '$password_hash', nivel = '$cargo', data = curDate(),
	ativo = 'Sim',  endereco = :endereco");		
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, email = :email,
	cpf = :cpf, telefone = :telefone, nivel = '$cargo', endereco = :endereco WHERE id = '$id'");
}





$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->execute();

echo 'Salvo com Sucesso';      
?>