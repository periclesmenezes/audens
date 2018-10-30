<?php
ob_start();
include_once("config.php");	
include_once("funcao.php");	
if(file_exists("leiame.txt")){
echo " </a></h1>";
exit;
}




if(isset($_GET['sair'])){
setcookie("usuario", "valor", time()-3600);
setcookie("cor_preferida", "valor", time()-3600);
setcookie("dt_ult_acesso", "valor", time()-3600);
setcookie("destino", "Todos", time()-3600);
$dt_ult_acesso = date("Y/m/d H:m:s");
mysql_query("INSERT INTO conversas VALUES ('', 'Robo','todos', 'O usuario $_COOKIE[usuario] deixou o chat!','".date("Y-m-d H:i")."', '".time()."')");

}

if(isset($_POST['entrar'])){
$usuario = AntiSql($_POST['usuario']);
$senha = md5($_POST['senha']);

if(empty($usuario)){
Alertar("O campo USUARIO em Branco", 0);
exit;
}
if(empty($senha)){
Alertar("O campo SENHA em Branco", 0);
exit;
}
$cor = AntiSql($_POST['cor']);
	if($cor == "azul"){
	$cor = "#0000ff";
	}elseif($cor == "vermelho"){
	$cor = "#ff0000";
	}elseif($cor == "preto"){
	$cor = "000000";
	}



$sql = mysql_query("SELECT * FROM usuario WHERE usuario='$usuario' AND senha='$senha' ");
$cont = mysql_num_rows($sql);
$reSql = mysql_fetch_assoc($sql);
$dt_ult_acesso = date("Y/m/d H:m:s");
if($cont == 0){
	echo "Dados inexistentes. tente novamente!";
	}else if($cont == 1 ){
	setcookie("usuario" ,ucfirst($usuario));
	setcookie("cor_preferida", $cor);
	setcookie("dt_ult_acesso", $reSql['dt_ult_acesso']);
	setcookie("destino", "Todos");
	mysql_query("INSERT INTO conversas VALUES ('', 'Robo', 'todos', 'O usuario $usuario acabou de entrar','".date("Y-m-d H:i")."', '".time()."')");
	mysql_query("UPDATE usuario SET dt_ult_acesso='$dt_ult_acesso' where usuario='$usuario' ");
	echo "<script> location.href='index.php'; </script>";
	}else{
	echo "Ocorreu algum erro inesperado, tente novamente mais tarde";	
	}
	



}




if(!isset($_COOKIE['usuario'])){
echo "
<div align='center'>
<h2><!-- CHAT DA HORA --></h2>
<form action='logar.php' method='post'>
<table>
	<tr>
		<td>
		<b>Digite seu Usuario:</b>
		</td>
		<td>
		<input type='text' name='usuario' id='usuario' />
		</td>
	</tr>
	<tr>
		<td>
		<b>Digite sua Senha: </b> 
		</td>

		<td>
		<input type='password' name='senha' id='senha' />
		</td>
	</tr>
	<tr>
	<td><b>Cor preferida?</b></td>
	<td>
	<select id='cor' name='cor'>
		<option value='preto' >Preto</option>
		<option value='azul' >Azul</option>
		<option value='vermelho' >Vermelho</option>	
	</select>
	
	</td>	
	</tr>
	<tr>
		<td>
		<a href='esqueci_senha.php'> Esqueci Minha Senha </a>
		</td>		
		<td>
		<a href='cad_usu.php'> Quero me Cadastrar </a>
			</td>
	</tr>	
		<tr>
	<td></td>
	<td></td>	
	</tr>
	<tr>
		<td align='right' >
		<input type='submit' name='entrar' id='entrar' value='Entrar' ></br>
		</td>
		<td aligh='left'>
		<input type='button' name='sair' onclick='window.close();' id='sair' value='Sair [x]' ></br>
		</td>
	</tr>
</table>	
		</form>
</div>
";
}else{
echo "<script> location.href='index.php'; </script>";
}




?>