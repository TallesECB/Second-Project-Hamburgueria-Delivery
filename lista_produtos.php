<?php
include("conecta.php");

$sql = "select * from produtos where procodig=$cod";
//-----------------------------

try {
	//$link foi criado no conecta.php
	$consulta = $link->prepare($sql);
	$consulta->execute();
	$vetResposta = array();
	while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
		array_push($vetResposta,$registro);
	}
	echo(json_encode($vetResposta));

}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>