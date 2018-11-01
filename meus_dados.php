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
	<table align='center'>
		<tr>
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
			<td><b>Confirmar: </b></td>
			<td><input size='30px' type='submit' value='Sim' name='editar' id='editar' /><td>
		</tr>
		</table>
</form>


</body>
</html>
