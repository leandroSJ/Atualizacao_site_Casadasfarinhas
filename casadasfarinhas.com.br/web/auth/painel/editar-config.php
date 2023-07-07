<?php 
require_once('../conexao.php');

$nome = $_POST['nome_sistema'];
$email = $_POST['email_sistema'];
$telefone_fixo = $_POST['telefone_fixo'];
$endereco = $_POST['endereco_sistema'];
$instagram = $_POST['instagram_sistema'];
$facebook = $_POST['facebook'];
$whatsapp_varejo = $_POST['whatsapp_varejo'];
$whatsapp_atacado = $_POST['whatsapp_atacado'];


//remover mascara telefone
$formata_telefone = preg_match("/^[0-a-z9\s]{1,50}$/i", $telefone_fixo);

if(!$formata_telefone){
	$telefone_fixo = str_replace(['(',')','-', ' '],'', $telefone_fixo);
}

//remover mascara telefone whatsapp
$telefone_whatsapp = preg_match("/^[0-a-z9\s]{1,50}$/i", $telefone);

if(!$telefone_whatsapp){
	$telefone = str_replace(['(',')','-', ' '],'', $telefone);
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$caminho = 'img/logo.png';
$imagem_temp = @$_FILES['foto-logo']['tmp_name']; 
if(@$_FILES['foto-logo']['name'] != ""){
	$ext = pathinfo(@$_FILES['foto-logo']['name'], PATHINFO_EXTENSION);   
	if($ext == 'png'){ 
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão da imagem para a Logo é somente *PNG';
		exit();
	}

}


$caminho = 'img/favicon.ico';
$imagem_temp = @$_FILES['foto-icone']['tmp_name']; 
if(@$_FILES['foto-icone']['name'] != ""){
	$ext = pathinfo(@$_FILES['foto-icone']['name'], PATHINFO_EXTENSION);   
	if($ext == 'ico'){ 
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão da imagem para a ícone é somente *ICO';
		exit();
	}

}

$caminho = 'img/logo_rel.jpg';
$imagem_temp = @$_FILES['foto-logo-rel']['tmp_name']; 
if(@$_FILES['foto-logo-rel']['name'] != ""){
	$ext = pathinfo(@$_FILES['foto-logo-rel']['name'], PATHINFO_EXTENSION);   
	if($ext == 'jpg'){ 
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão da imagem para o Relatório é somente *Jpg';
		exit();
	}

}

$query = $pdo->prepare("UPDATE config SET nome = :nome, email = :email, telefone_fixo = :telefone_fixo, endereco = :endereco, 
whatsapp_varejo = :whatsapp_varejo, whatsapp_atacado = :whatsapp_atacado , instagram = :instagram, facebook = :facebook");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone_fixo", "$telefone_fixo");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":whatsapp_varejo", "$whatsapp_varejo");
$query->bindValue(":whatsapp_atacado", "$whatsapp_atacado");
$query->bindValue(":instagram", "$instagram");
$query->bindValue(":facebook", "$facebook");
$query->execute();

echo 'Editado com Sucesso';
 ?>