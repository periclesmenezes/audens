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
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/sala1.php" type="text/css">
	<link rel="stylesheet" href="css/fade.css"  type="text/css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/button_style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sanchez">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<!-- Bootstrap CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<title> Audens </title>
</head>

<body c onLoad="document.formulario.chatear.focus();" id="sala2">
	<div class="container mt-3" id="conteiner">
		<header id="cabecalho" class="mb-3">
			<hgroup>
				<img src="imagens/logo/LOGO AUDENS GROUP3.png" width="220px" height="55px">
				<section class="portfolio-experiment" id="sair">
					<a href='logar.php?sair=0'>
						<span class="text" >Sair</span>
						<span class="line -right"></span>
						<span class="line -top"></span>
						<span class="line -left"></span>
						<span class="line -bottom"></span>
					</a>
				</section>
				<section class="portfolio-experiment" id="meusdados">
					<a href='meus_dados.php'>
						<span class="text">Meus Dados</span>
						<span class="line -right"></span>
						<span class="line -top"></span>
						<span class="line -left"></span>
						<span class="line -bottom"></span>
					</a>
				</section>
				<section class="portfolio-experiment" id="atualizar">
					<a href='index.php'>
						<span class="text">Atualizar</span>
						<span class="line -right"></span>
						<span class="line -top"></span>
						<span class="line -left"></span>
						<span class="line -bottom"></span>
					</a>
				</section>
			</hgroup>
			<h6 class="mt-2"><?php $Config->BoasVindas(); ?></h6>
			<h2 class="">Sala de Entrevistas</h2>
		</header>
		<div id="husuarios" class="row mb-1 text-center">
				<h1 class="mr-auto ml-auto">Usuários Online</h1>
		</div>
		<div id="busuario" class="row mb-1 text-center">
			<iframe class="mr-auto ml-auto mb-2" name='iframe-usu-online' id="iusuarios" src='usuarios-online.php'></iframe>
		</div>
<!--
	<section id="batepapo"><center>
		<section id="mensagens">
			<iframe  name="iframe" id="imensagens" src='iframe.php'></iframe>
		</section>
		<br/>
		<form action='index.php' name='formulario' method='post'> <hr>
			<br><div>
							
			<b id="mensagem" style="font-family: 'Sanchez', serif;">Mensagem: </b><input type='text' class='caixa_mensagem' id='chatear' placeholder="Digite aqui..." name='chatear' style="width: 426px; border-radius: 5px;" />
							
							<select class='div-select' id='destino' name='destino' >
								<option selected='selected' value='Todos'>Todos</option>
								<?php  //$users = new Conversas; $users->ListaOnline(); ?>
							</select>
								<button class="button" id='css3button' value='Enviar' type='submit' name='enviar'><span>Enviar </span></button>
								
				</div>
		</form>	
		<br/>
		<button id="gravar">
			<i><span><img src="imagens/logo/microfone.gif" ..... width="22px" height="22px" class="fa fa-microphone"></span></i>
		</button>
		<h4 id="status" style="display: block; text-align: center;"> <span>Click para acionar</span>
		</center>
	</section>
	<aside id="usuarios"><center>
		<header id="ucabecalho" style="height: 48px;">
			<h1>Usuários Online</h1>
		</header>
		<iframe name='iframe-usu-online' id="iusuarios" src='usuarios-online.php'></iframe>
		</center>
	</aside>
-->

	<!-- Botão para acionar modal >
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Abrir modal de demonstração</button -->

	<!-- Modal -->
	<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titulomodal">Sala de Bate Papo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row"><p>Meu ID: <span id="meu-id">...</span></p></div>
				<div class="row"><p>Em chamada com <span id="destino-id">...</span></p></div>
				<!-- div class="container" -->
					<div class="card-deck mb-3 mt-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<h2>Remoto</h2>
							</div>
							<div class="card-body">
								<video class="card-img-top" id="destino-video" autoplay></video>
							</div>
						</div>
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<h2>Local</h2>
							</div>
							<div class="card-body">
								<video class="card-img-top" id="meu-video" autoplay></video>
							</div>
						</div>
					</div>
				<!-- /div -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="make-call">Ligar</button>
				<button type="button" class="btn btn-danger"  id="end-call">Desligar</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
	</div>

	<footer id="rodape">
		<p>Desenvolvido por Péricles Filho & Associados. Versão: V1.1.001</p>
	</footer>
	</div>
	<!-- JavaScript -->
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript" src="js/voz-texto.js"></script>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
