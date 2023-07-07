<?php 
require_once("../../../conexao.php");

$tabela = 'produtos_atacado';

$id = $_POST['id'];
$nome = $_POST['nome'];
$ean = $_POST['ean'];
$categoria = $_POST['categoria'];

//validar nome
$query = $pdo->query("SELECT * from $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Já existe um produto cadastrado com esse nome, escolha outro !!!';
	exit();
}

//validar ean
$query = $pdo->query("SELECT * from $tabela where ean = '$ean'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(empty($_POST['ean'])) {	
	
}elseif (@count($res) > 1 and $id != $res[0]['id']) {
	# code...
	$nome = $res[0]['nome'];
	echo "O código de barras já foi usado para o produto: $nome";	
	exit();
}

//validar troca da foto
$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['foto'];
}else{
	$foto = 'sem-foto.jpg';
}


//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/produtos_atacado/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'webp'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.jpg"){
				@unlink('../../img/produtos_atacado/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}



if($id == ''){
	$query = $pdo -> prepare("INSERT INTO $tabela SET nome = :nome, ean = :ean, 
	categoria = '$categoria', foto = '$foto'");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, ean = :ean, categoria = '$categoria',	
	 foto = '$foto'  WHERE id = '$id'");
}



$query->bindValue(":nome", "$nome");
$query->bindValue(":ean", "$ean");
$query->execute();

echo 'Salvo com Sucesso';  

?>