<?php
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "chat";

if(@!mysql_connect($host, $usuario, $senha)){
die("erro nao pode se conectar");
}
if(@!mysql_select_db($banco)){
die("erro base de dados");
}




//class
//TEMPO PARA REFRESH DO IFRAME
$Tempo = 5;
$Refresh = $Tempo * 1000;


class Config {
function __construct(){}


	function BoasVindas(){
	echo "Ola <b>$_COOKIE[usuario]</b> Seu ultimo acesso foi em: $_COOKIE[dt_ult_acesso]</b>";
	}





}



?>