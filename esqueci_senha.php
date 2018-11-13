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

<form  action='esqueci_senha.php' method='post' id='login1' >
<link rel='stylesheet' href='css/style.css' type='text/css' />
<link rel='stylesheet' href='css/button_style.css'  />
<img src='imagens/logo/LOGO AUDENS GROUP3.png' style='border-radius: 7px; margin:50px 17px 11px 210px;' width='220px' height='55px'>
	<table align='center' style='margin-left:165px;' >
		<tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr>
			<td><b> Email: </b></td>
			<td><input type='text' name='email' id='email' /><td>
		</tr>	<br>
		<tr><br>
			<td><b> Usu&aacute;rio: </b></td>
			<td><input type='text' name='usuario' id='usuario' /><td>
		</tr>	<br>	<tr>
			<td><b></b></td>
			<td><br><button class='button' id='css3button_login_tela_recuperar' type='enviar' value='enviar' name='enviar' ><span> Recuperar Senha </span></button><td>
		</tr>

</form>
</html>