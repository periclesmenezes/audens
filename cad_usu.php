
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
<table align='center'>
	<tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr>
	<td><b>Email:</b></td>
	<td><input type='text' id='email' name='email' />(Para recuperar senha)</td>
	</tr>
	<tr>
	<td><b>Usuario:</b></td>
	<td><input type='text' id='usuario' name='usuario' /></td>
	</tr>	<tr><br>
	<td><b>Senha:</b></td>
	<td><input type='password' id='senha' name='senha' /></td>
	</tr>	
	<tr>
	<td></td><br><br>
	<td><input type='submit' name='cadastrar' id='cadastrar' value='Cadastrar Usuario' /></td>
	</tr>
</table>


</form>