
<link rel="stylesheet" href="css/estilo.php" type="text/css" />
<?php
include_once("config.php");
include_once("Class.usuario.php");

if(isset($_POST['cadastrar'])){
	if($_POST['email'] == ""){
	echo "O campo nome nao pode ficar vazio.";
	}else if($_POST['usuario'] == ""){
	echo "O campo nome nao pode ficar vazio.";
	}else if($_POST['senha'] == ""){
	echo "O campo nome nao pode ficar vazio.";
	}else {
	$cadastrar = new Usuario;
	$cadastrar->Cadastrar($_POST['email'], $_POST['usuario'], $_POST['senha']);
	}
}




?>

<form action='cad_usu.php' method='post' id='login1'>
<img src='imagens/logo/LOGO AUDENS GROUP3.png' style='border-radius: 7px; margin:50px 17px 11px 210px;' width='220px' height='55px'>
<link rel='stylesheet' href='css/style.css' type='text/css' />
<link rel='stylesheet' href='css/button_style.css'  />
<table align='center'>
	<tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr>
	<td><b>Email:</b></td>
	<td><input type='text' id='email' name='email' />(Para recuperar senha)</td>
	</tr>
	<tr>
	<td><b>Usu&aacute;rio:</b></td>
	<td><input type='text' id='usuario' name='usuario' /></td>
	</tr>	<tr>
	<td><b>Senha:</b></td>
	<td><input type='password' id='senha' name='senha' /></td>
	</tr>	
	<tr>
	<td></td>
	<td>
		<button class='button' id='css3button_login_cadastro' id='cadastrar' type='submit' value='Cadastrar Usuario' name='Cadastrar' ><span> </span>Gravar Usu&aacute;rio</button><td>
		</td>
	</tr>
</table>


</form>