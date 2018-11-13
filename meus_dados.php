<link rel="stylesheet" href="css/estilo.php" type="text/css" />

<?php
ob_start();

if(!isset($_COOKIE['usuario'])){
echo "<script>location.href='logar.php'; </script>";
}


include_once("config.php");
include_once("Class.usuario.php");
$Dados = new Usuario ;

if(isset($_POST['editar'])){
$Dados->EditarDados($_POST['email'], $_POST['usuario'], $_POST['senha']);
}

?>

<form action='meus_dados.php' method='post' id='login1'>
	<img src='imagens/logo/LOGO AUDENS GROUP3.png' style='border-radius: 7px; margin:50px 17px 11px 210px;' width='220px' height='55px'>
<link rel='stylesheet' href='css/style.css' type='text/css' />
<link rel='stylesheet' href='css/button_style.css'  />
	<table align='center'>
		<tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr><tr>
			<td><b>Email: </b></td>
			<td><input size='30px' value='<?php echo $Dados->ListarDados('email'); ?>' type='text' name='email' id='email' /><td>
		</tr>	
		<tr>
			<td><b>Usuario: </b></td>
			<td><input value='<?php echo $Dados->ListarDados('usuario'); ?>' size='30px' type='text' name='usuario' id='usuario' /><td>
		</tr>	

		<tr>
			<td><b>Senha: </b></td>
			<td><input size='30px' type='password' name='senha' id='senha' /><td>
		</tr>	
<tr>
		<tr>
			<td></td>
			<td><button class='button' id='css3button_login_confirmar' type='submit' value='Sim' name='editar' id='editar' ><span>Confirmar</span></button><td>
 			
		</tr>
		</table>
</form>


</body>
</html>
