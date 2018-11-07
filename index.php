<link rel="stylesheet" href="css/estilo.php" type="text/css" />
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


<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
	<title> Audens </title>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script src="js/js.js"></script>
</head>
<body onLoad="document.formulario.chatear.focus();" id="sala2">
<div id="conteiner">
	<header id="cabecalho">
		<hgroup>
			<h1>Audens</h1>
			<h2>Sala de Entrevistas</h2>
		</hgroup>
		<nav id="menu">
			<h1>Menu Principal</h1>
			<ul type="circle">
				<li><?php $Config->BoasVindas(); ?></li>
				<li><a href='index.php'>Atualizar</a></li>
				<li><a href='meus_dados.php'>Meus Dados</a></li>
				<li><a href='logar.php?sair=0'>Sair</a></li>
			</ul>
		</nav>
	</header>
	<section id="batepapo"><center>
		<section id="mensagens">
			<iframe  name="iframe" id="imensagens" src='iframe.php'></iframe>
		</section>
		<br/>
		<form action='index.php' name='formulario' method='post'> <hr>
			<b>Mensagem: </b><input type='text' id='chatear' name='chatear' size='40' />
							<select id='destino' name='destino' >
								<option selected='selected' value='Todos'>Todos</option>
								<?php  $users = new Conversas; $users->ListaOnline(); ?>
							</select>
							<input align='left' id='css3button' name='enviar' value='Enviar' size='' type='submit' size='10px' />
		</form>	
		<br/>
		<button id="gravar">
			<i class="fa fa-microphone"></i>
		</button>
		<h4 id="status" style="display: block; text-align: center;"> <span>Click para acionar</span>
		</center>
	</section>
	<aside id="usuarios"><center>
		<header id="ucabecalho">
			<h1>Usuários Online</h1>
		</header>
		<iframe name='iframe-usu-online' id="iusuarios" src='usuarios-online.php'></iframe>
		</center>
	</aside>
	<footer id="rodape">
		<p>Desenvolvido por Péricles Filho & Associados. Versão: V1.1.001</p>
	</footer>
</div>
</body>
<script type="text/javascript">
	// Verifica se o Browser suporta a API de transcrição.
	window.SpeechRecognition = window.SpeechRecognition       ||
								window.webkitSpeechRecognition ||
								null;
	//caso não suporte esta API DE VOZ                              
	if (window.SpeechRecognition === null) {
		document.getElementById('ws-unsupported').classList.remove('hidden');
		document.querySelector('#gravar i').setAttribute('style','box-shadow: inset 0 0 20px 100px red;color:#000;');
	}else{
		var recognizer = new window.SpeechRecognition();
		var transcription = document.getElementById("chatear");
		//Para o reconhecedor de voz, não parar de ouvir, mesmo que tenha pausas no usuario
		recognizer.continuous = true;
		recognizer.languagen = "pt-br";

		//Função que fica escutando microfone e carregando o texto.
		recognizer.onresult = function(event){
								transcription.value = "";
								for (var i = event.resultIndex; i < event.results.length; i++) {
									if(event.results[i].isFinal){
										transcription.value = event.results[i][0].transcript + '.';
									}else{
										transcription.value += event.results[i][0].transcript;
									}
								}
							}
		//Fim da Função.

		document.querySelector("#gravar i").addEventListener("click",
			function(){
				try {
				//Ativa o microfone.
					recognizer.start();
					document.getElementById("status").getElementsByTagName("span")[0].className = "Record";
					document.getElementById("status").getElementsByTagName("span")[0].innerHTML = "Record";
				} catch(ex) {
				//Caso já esteja ativo o microfone, para.
					recognizer.stop();
					document.getElementById("status").getElementsByTagName("span")[0].className = "Stop";
					document.getElementById("status").getElementsByTagName("span")[0].innerHTML = "Stop";
				}
			}
			)
	}
</script>

