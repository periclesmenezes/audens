<?
include_once("config.php");
include_once("Class.usuario.php");


if(isset($_POST['enviar'])){
$Resetar = new Usuario;
$Resetar->EsqueciSenha($_POST['usuario'], $_POST['email']);

}



?>

<html>

<form action='esqueci_senha.php' method='post'>
	<table align='center'>
		<tr>
			<td><b>Digite o seu Email: </b></td>
			<td><input type='text' name='email' id='email' /><td>
		</tr>	
		<tr>
			<td><b>Digite o seu Usuario: </b></td>
			<td><input type='text' name='usuario' id='usuario' /><td>
		</tr>		<tr>
			<td><b>Confirmar? </b></td>
			<td><input type='submit' value='Sim :D' name='enviar' id='enviar' /><td>
		</tr>

</form>
</html>