<?php
session_start();
include("conecta.php");

$nome = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];

if($nome == "admin" && $senha == 1234)
{
    $_SESSION['admin'] = $nome;
    header('location:indexadmin.html');     
} else {    

        $sql = "select  clicodig,clinome,clisenha from clientes where '$nome' = clinome and '$senha' = clisenha ";

        try {
        	
        	$consulta = $link->prepare($sql);
        	$consulta->execute();
            //echo (0);
            $linhas=$consulta->rowCount(); // Assim pega apenas uma linha de cadatro e verifica se esta certo o login
            if($linhas == 1){
                $resultado = $consulta->fetch();
                
                $_SESSION['codigo'] = $resultado['clicodig'];
                $_SESSION['user'] = $nome;
                
                echo('Login Realizado com Sucesso, você será redirecionado em 2 segundos');
                header("Refresh: 2;url=indexuser.php"); 
               
            }else {
                header('location:index.html');   
            }

        }
        catch(PDOException $ex){
            echo($ex->getMessage());
            header('location:index.html');   
        }
    }    

?>

}