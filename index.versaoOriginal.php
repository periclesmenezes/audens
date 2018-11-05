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

<html>
<head>
	<link rel="stylesheet" href="css/estilo.css" type="text/css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<meta charset="UTF-8"/>
	<title> Audens </title>
	<script type="text/javascript" src="../js/ajax.js"></script>
</head>
<body onLoad="document.formulario.chatear.focus();"id="sala2">
<!-- Menu Superior -->
	<div class="menu" align='right' id='sala1'>
		<?php $Config->BoasVindas(); ?> 
		<a href='index.php'>Atualizar</a> - 
		<a href='meus_dados.php'>Meus Dados</a> - 
		<a href='logar.php?sair=0'>Sair [x]</a>
	</div>
<!-- Tela Principal -->
	
		<div class="laterald"id="sala2">
			<div class='div-chat'>
				<div class='t01'>
					<iframe  name="iframe" id="iframe" width='100%' height='100%' src='iframe.php'></iframe>
				</div>
				<div class='t02'>
				<center>
				<!--	<h2> LISTA DE ICONES </h2>-->
					<div>
						<!--?php $img = new Emoticon; $img->Gerar(); ?-->
					</div>
					<div>
						<form action='index.php' name='formulario' method='post'> <hr>
						<br>
							<b>Mensagem: </b><input type='text' id='chatear' name='chatear' size='40' />
							<select id='destino' name='destino' >
								<option selected='selected' value='Todos'>Todos</option>
								<?php  $users = new Conversas; $users->ListaOnline(); ?>
							</select>
							<input align='left' id='enviar' name='enviar' value='Enviar' size='' type='submit' size='10px' />
						</form>
					</div>
					<br>
					<button id="gravar">
						<i class="fa fa-microphone"></i>
					</button>
					<p id="status"> <span>Parado</span></p>
				</center>
				</div>
			</div>
			<div class='div-usuarios'> 
				<center>
				<h1>Lista de usuários Online</h1>
				<iframe name='iframe-usu-online' width='100%' height='auto' src='usuarios-online.php'> </iframe>
				</center>
			</div>
		</div>
	</div>
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
						document.getElementById("status").getElementsByTagName("span")[0].className = "Executando";
						document.getElementById("status").getElementsByTagName("span")[0].innerHTML = "Executando";
					} catch(ex) {
					//Caso já esteja ativo o microfone, para.
						recognizer.stop();
						document.getElementById("status").getElementsByTagName("span")[0].className = "";
						document.getElementById("status").getElementsByTagName("span")[0].innerHTML = "Parado";
					}
				}
				)
	    }
    </script>
</body>
</html>