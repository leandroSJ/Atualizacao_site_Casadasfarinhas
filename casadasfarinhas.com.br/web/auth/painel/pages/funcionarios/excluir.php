<?php 
require_once("../../../conexao.php");
$tabela = 'usuarios';

$id = $_POST['id'];
$pdo->query("DELETE FROM $tabela where id = '$id'");
echo 'Excluído com Sucesso';
      

?>