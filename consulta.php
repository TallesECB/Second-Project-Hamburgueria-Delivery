<?php
include("conecta.php");

$sql = "select * from produtos,categorias where procateg = catcodig order by procodig";
//-----------------------------

try {
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