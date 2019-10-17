<?php
include("conecta.php");

$cod = $_REQUEST['cod'];

$sql = "select * from produtos where procodig=$cod";
//-----------------------------

try {
	$consulta = $link->prepare($sql);
	$consulta->execute();

	$vetResposta = array();
	$registro = $consulta->fetch(PDO::FETCH_ASSOC);
 	echo(json_encode($registro));

}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>