<link rel="stylesheet" href="css/sala1.php" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">
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
	<header id="cabecalho" style="height: 130px;">
		
		<hgroup>
			<img src="imagens/logo/LOGO AUDENS GROUP3.png" style="border-radius: 7px; margin:9px 0px -5px 17px;" width="220px" height="55px">
		<ul  style="padding-left: 28px; margin-top: 14px; margin-bottom: -8px; list-style-type: none; font-family: 'Sanchez', serif;"><li style="margin-top: 18px;"><?php $Config->BoasVindas(); ?></li></ul>
			<h2 style="margin-top: 16px; margin-left: 19px;">Sala de Entrevistas</h2>
		</hgroup>
		<aside>
		<nav id="menu" style="width: 300px; height: 100px; margin-left: 729px; ">
				
			<h1>Menu Principal</h1>
			<ul type="circle" id='sala1' style="margin-top: 40px; font-family: 'Sanchez', serif;">
				<li><a href='index.php' >Atualizar</a></li>
				<li><a href='meus_dados.php'>Meus Dados</a></li>
				<li><a href='logar.php?sair=0'>Sair</a></li>
			</ul>
			
		</nav></aside>
			
			
			
		
	</header>
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
								<?php  $users = new Conversas; $users->ListaOnline(); ?>
							</select>
							<!--input align='left' class='button' id='css3button' name='enviar' value='Enviar' type='submit'/-->
								<button class="button" id='css3button' value='Enviar' type='submit' name='enviar'><span>Enviar </span></button>
								</div>
		</form>	
		<br/>
		<button id="gravar">
			<i class="fa fa-microphone"></i>
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

