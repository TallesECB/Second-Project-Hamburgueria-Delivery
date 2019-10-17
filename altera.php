<?php 
include("conecta.php");
include("funcoes.php");

$cod = $_REQUEST['procodig'];
$nome = utf8_decode($_REQUEST['pronome']);
$valor = $_REQUEST['propreco'];
$desc = utf8_decode($_REQUEST['prodesc']);
$categoria = $_REQUEST['procateg'];
$imagem = $_REQUEST['proimg'];

try {
	$sql = "update produtos set pronome='$nome', prodesc='$desc', propreco='$valor', procateg='$categoria', proimg='$imagem' where procodig=$cod";
	$consulta = $link->prepare($sql);
	$consulta->execute();
	echo(0);
}
catch(PDOException $ex){
echo($ex->getMessage());
}	

?>