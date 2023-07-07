<?php 
require_once('../conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];
$endereco = $_POST['endereco'];
$password_hash = password_hash($senha, PASSWORD_DEFAULT);

if($senha != $conf_senha){
	echo 'As senhas são diferentes!!';
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
	$telefone = str_replace(['(',')','-', ' '],'', $telefone);
}

//validar email
$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Email já Cadastrado, escolha outro!!';
	exit();
}

//validar cpf
$query = $pdo->query("SELECT * from usuarios where cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'CPF já Cadastrado, escolha outro!!';
	exit();
}

$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, senha = :senha, senha_crip = '$password_hash', endereco = :endereco WHERE id = '$id'");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":senha", "$senha");
$query->bindValue(":endereco", "$endereco");
$query->execute();

echo 'Editado com Sucesso';
 ?>