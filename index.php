<?php
ob_start();
include_once("config.php");
$Config = new Config();

if(!isset($_COOKIE['usuario'])){
echo "<script>location.href='logar.php'; </script>";
}


include("Class.chat.php");
include("Class.emoticon.php");

if(isset($_POST['enviar'])){
$chat = new Conversas;
$destino = $_POST['destino'];
$chat->Adicionar($_POST['chatear'], $destino);
}




?>


<html>

<head>
<title> Audens </title>
<script type="text/javascript" src="../js/ajax.js"></script>
</head>
<body onLoad="document.formulario.chatear.focus();">


<div align='right' > <?php $Config->BoasVindas(); ?> <a href='index.php'>Atualizar</a> - <a href='meus_dados.php'>Meus Dados</a> - <a href='logar.php?sair=0'>Sair [x]</a></div><br>
	<table align='center'>
		<tr>
			<td>
			<iframe  name="iframe" id="iframe" width='100%' height='500px' src='iframe.php' height='100%'></iframe>
			</td>
			</tr>
			<tr>
			<td>
			</br>
			<div id='emoticon' align='center' ><?php $img = new Emoticon; $img->Gerar(); ?></div>
			<form action='index.php' name='formulario' method='post' ><hr>
			<b>Digite aqui sua Mensagem: </b><input type='text' id='chatear' name='chatear' size='40' />
			<select id='destino' name='destino' >
				<option selected='selected' value='Todos'>Todos</option>
				<?php  $users = new Conversas; $users->ListaOnline(); ?>
			
			</select>
			
			<input align='left' id='enviar' name='enviar' value='Enviar Chat' size='' type='submit' size='10px' />
			</form>
			</td>
		</tr>
	


</body>
</html>