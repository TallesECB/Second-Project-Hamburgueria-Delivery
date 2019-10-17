<?php
include("conecta.php");



$nome = ($_REQUEST['pronome']);

$desc = $_REQUEST['prodesc'];
$valor = $_REQUEST['propreco'];
$imagem = $_REQUEST['proimg'];

$categoria = $_REQUEST['procateg'];

$sql = "insert into produtos (pronome,prodesc,propreco,procateg,proimg) values ('$nome','$desc','$valor','$categoria','$imagem')";

try {

	$consulta = $link->prepare($sql);
	
	$consulta->execute();

	echo (0);
}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>