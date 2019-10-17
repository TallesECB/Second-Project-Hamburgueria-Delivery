<?php
include("conecta.php");


$vetQtds = $_REQUEST['qtd'];

$vetCodigos = $_REQUEST['codigo'];

$clicodig = $_REQUEST['clicodig'];


$sql = "insert into carrinho (carcodig,clicodig) values ('','$clicodig')";
try {
	$consulta = $link->prepare($sql);
	
	$consulta->execute();

	$carcodig = $link->lastInsertId();
	
}
catch(PDOException $ex){
	echo($ex->getMessage());
}

$sql = "insert into itensCarrinho (procodig,itequant,carcodig) values ";


$auxSQL = "";
for ($i=0; $i< count($vetCodigos); $i++){
	$auxSQL .= "(" . $vetCodigos[$i] . "," . $vetQtds[$i] . ",$carcodig)";
	if ($i < count($vetCodigos) -1 ){
		$auxSQL .= ",";
	}
}

$sql .= $auxSQL;

try {

	$consulta = $link->prepare($sql);
	
	$consulta->execute();
	
	echo (0);
}
catch(PDOException $ex){
	echo($sql);
}


?>