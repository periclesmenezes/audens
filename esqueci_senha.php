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
<link rel='stylesheet' href='css/style.css' type='text/css' />
<link rel='stylesheet' href='css/button_style.css'  />
<img src='imagens/logo/LOGO AUDENS GROUP3.png' style='border-radius: 7px; margin:50px 17px 11px 210px;' width='220px' height='55px'>
	<table align='center' >
		<tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr>
			<td><b> Email: </b></td>
			<td><input type='text' name='email' id='email' /><td>
		</tr>	<br>
		<tr><br>
			<td><b> Usu&aacute;rio: </b></td>
			<td><input type='text' name='usuario' id='usuario' /><td>
		</tr>	<br>	<tr>
			<td><b></b></td>
			<td><br><br><br><br><button class='button' id='css3button_login_recuperar' type='submit' value='Entrar' name='entrar' ><span> Recuperar Senha </span></button><td>
		</tr>

</form>
</html>