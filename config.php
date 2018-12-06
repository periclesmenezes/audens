<?php

/*
$link = mysqli_connect("127.0.0.1", "root", "", "chat");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
*/

/*$host = "localhost";
$usuario = "id7841660_root";
$senha = "123456";
$banco = "id7841660_chat";
*/
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
	echo "Ol&aacute; <b>$_COOKIE[usuario]</b> Seu &uacute;ltimo acesso foi em: $_COOKIE[dt_ult_acesso]";
	}





}



?>