<link rel="stylesheet" href="css/estilo.php" type="text/css" />

<?Php
include_once("config.php");
include_once("Class.usuario.php");


if(isset($_POST['enviar'])){
$Resetar = new Usuario;
$Resetar->EsqueciSenha($_POST['usuario'], $_POST['email']);

}



?>

<html>

<form  action='esqueci_senha.php' method='post' id='login1'>
	<table align='center' >
		<tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr>
			<td><b> Email: </b></td>
			<td><input type='text' name='email' id='email' /><td>
		</tr>	
		<tr>
			<td><b> Usuario: </b></td>
			<td><input type='text' name='usuario' id='usuario' /><td>
		</tr>		<tr>
			<td><b>Entrar: </b></td>
			<td><input type='submit' value='Sim' name='enviar' id='enviar' /><td>
		</tr>

</form>
</html>