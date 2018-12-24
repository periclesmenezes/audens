<?php
include_once("config.php");
$Config = new Config();

if(!isset($_COOKIE['usuario'])){
  echo "<script>location.href='logar.php'; </script>";
}

include_once("Class.chat.php");
include_once("Class.emoticon.php");

//Carrega o destino com o usuário informado para conversar.
$destino = "";
if(isset($_GET["u"]))
{
  $destino = $_GET["u"];
} else 
{
  $destino = $_COOKIE['destino'];
}
if(isset($_POST['menviar'])){
	$chat = new Conversas;
//	$destino = $_POST['destino'];
	$chat->Adicionar($_POST['chatear'], $destino);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Entrevista</title>

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
</head>

<body>
  <div class="container mt-3" id="conteiner">
    <header id="cabecalho" class="mb-3">
      <hgroup>
        <img src="imagens/logo/LOGO AUDENS GROUP3.png" width="220px" height="55px">
        <section class="portfolio-experiment" id="Voltar">
          <a href='index.php'>
            <span class="text" >Sair</span>
            <span class="line -right"></span>
            <span class="line -top"></span>
            <span class="line -left"></span>
            <span class="line -bottom"></span>
          </a>
        </section>
      </hgroup>
    </header>
    <div id="video-container">
      <div class="card-deck mb-3 mt-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h2><span id="entrevistado">Entrevista</span></h2>
          </div>
          <div class="card-body">
            <video class="card-img-top" id="destino-video" autoplay></video>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h2><span id="entrevistador">Entrevistador</span></h2>
          </div>
          <div class="card-body">
            <video class="card-img-top" id="meu-video" autoplay></video>
          </div>
        </div>
      </div>
      <!-- Bate papo -->
      <div class="text-center" id="batepapo">
  		  <!--section id="mensagens" -->
			    <iframe  name="iframe" id="imensagens" src='iframe.php'></iframe>
		    <!-- /section -->
    		<br>
		    <form action=<?php echo "'batepapo.php?u=".$destino."'"; ?> name='formulario' method='post'> 
          <div>
            <b id="mensagem" style="font-family: 'Sanchez', serif;">Mensagem: </b>
            <input type='text' class='caixa_mensagem' id='chatear' placeholder="Digite aqui..." name='chatear' style="width: 426px; border-radius: 5px;" />
            <button class="button" id='css3button' value='Enviarm' type='submit' name='menviar'><span>Enviar</span></button>
          </div>
		    </form>	
      </div>
        <!-- Tela para fazer ligação -->
        <div id="waitingAction">
          <hr>
          <br>
          <h2>Meu ID: <span id="meu-id">...</span></h2>
          <p>Compartilhe esse ID para que outros membros possam falar com você.</p>
          <h3>Fazer ligação</h3>
          <div class="form-group">
            <input type="text" placeholder="Informe o id de destino..." id="destino-id">
            <a href="#" class="btn btn-primary" id="make-call">Ligar</a>
          </div>
        </div>
        <!-- Chamada ativo, tela para finalizar -->
        <div id="createCall">
          <p>Em chamada com <span id="chamada-destino">...</span></p>
          <p><a href="#" class="btn btn-danger" id="end-call">Finalizar</a></p>
        </div>
      </div>
    </div>
  <footer>
    <!-- input type="button" class="btn btn-primary btn-lg btn-brock" value="Voltar..." onclick="history.go(-1)" -->
  </footer>
</div>
	<!-- JavaScript -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="js/peer.js"></script>
  <script type="text/javascript" src="js/peerJS-cliente.js"></script>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>