<?php 
require_once("../../../conexao.php");

$tabela = 'slider_receitas';

$id = $_POST['id'];

$titulo_receitas = $_POST['titulo_receitas'];
$link_receitas = $_POST['link_receitas'];

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

$caminho = '../../img/slider_receitas/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'webp'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.jpg"){
				@unlink('../../img/slider_receitas'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}



if($id == ''){
	$query = $pdo -> prepare("INSERT INTO $tabela SET foto = '$foto', titulo_receitas = :titulo_receitas,
	link_receitas = :link_receitas");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET foto = '$foto', titulo_receitas = :titulo_receitas,
	link_receitas = :link_receitas WHERE id = '$id'");
}

$query->bindValue(":titulo_receitas", "$titulo_receitas");
$query->bindValue(":link_receitas", "$link_receitas");
$query->execute();

echo 'Salvo com Sucesso';  

?>