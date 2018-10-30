<?php


function AntiSql($Valor){
$Valor = mysql_real_escape_string($Valor);
return($Valor);
}



function Alertar($Valor, $Pg){


	echo "<script>";
	echo "alert('".$Valor."');";
	if($Pg == 0){
	echo "location.href='logar.php';";	
	}
	
	echo "</script>";

}



?>