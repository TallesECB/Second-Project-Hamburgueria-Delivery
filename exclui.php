<?php
include("conecta.php");
include("funcoes.php");

$cod = $_REQUEST['cod'];

try {
	$sql = "delete from produtos where procodig=$cod";
	$consulta = $link->prepare($sql);
	$consulta->execute();
	echo(0);
}
catch(PDOException $ex){
	echo($ex->getMessage());
}	

?>