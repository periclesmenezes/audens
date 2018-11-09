
<link rel="stylesheet" href="css/estilo.php" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">

<?php
ob_start();
include_once("config.php");	
include_once("funcao.php");	
include_once("logar.php");	




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
<link rel='stylesheet' href='css/style.css' type='text/css' />
<div align='center' id='login1'>
<link rel='stylesheet' href='css/button_style.css'  />
<img src='imagens/logo/LOGO AUDENS GROUP3.png' style='border-radius: 7px; margin:40px 17px -51px 17px;' width='220px' height='55px'>
<form style='padding-top: 84px;' action='logar.php' method='post'>
<table style='font-family: 'Sanchez', serif;'>
	<tr>
		<td>
		<b> Usuario:</b>
		</td>
		<td>
		<input type='text' name='usuario' id='usuario' />
		</td>
	</tr>
	<tr>
		<td>
		<b> Senha: </b> 
		</td>

		<td>
		<input type='password' name='senha' id='senha' />
		</td>
	</tr>
	<tr>
		<td><b>Cor :</b></td>
		<td>
		<select id='cor' name='cor'>
			<option value='preto' >Preto</option>
			<option value='azul' >Azul</option>
			<option value='vermelho' >Vermelho</option>	
		</select>

		</td>	
	</tr>
	
	<section class='portfolio-experiment' id='login_recuperar'>
									  <a href='esqueci_senha.php'>
										<span class='text'>Recuperar Senha</span>
										<span class='line -right'></span>
										<span class='line -top'></span>
										<span class='line -left'></span>
										<span class='line -bottom'></span>
									  </a>
							</section>
							<section class='portfolio-experiment' id='login_cadastrar'>
									  <a href='cad_usu.php'>
										<span class='text'>Cadastrar</span>
										<span class='line -right'></span>
										<span class='line -top'></span>
										<span class='line -left'></span>
										<span class='line -bottom'></span>
									  </a>
							</section>
	
	<button class='button' id='css3button_login_entrar' type='submit' value='Entrar' name='entrar' ><span>Entrar </span></button>
	
	<button class='button' id='css3button_login_sair' type='button' name='sair' onclick='window.close();' id='sair' value='Sair'><span>Sair </span></button>
	
</table>	
		</form>
</div>
";
}else{
echo "<script> location.href='index.php'; </script>";
}




?>