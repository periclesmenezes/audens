<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Conferencia</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  <script type="text/javascript" src="./js/peer.js"></script>
  <script>

    // Variavel para pegar permissão de camera e microfone, definição de acordo com navegador.
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

    // Definições do PeerJS, como dominio, key e outros
    var peer = new Peer({ host: 'localhost', port:9000, debug: 3});

    // Pega ID da conexão atual
    peer.on('open', function(id)
    {
      $('#my-id').text(id);
    });

    // Recebendo uma chamada
    peer.on('call', function(call)
    {
      // Responde a chamada criando uma chamada entre os dois usuários
      call.answer(window.localStream);
      createCall(call);
    });

    // Se houver algum erro
    peer.on('error', function(err)
    {
      // Exibe o erro em um alert
      alert(err.message);
      // Agurada nova conexão ou ação
      waitingAction();
    });

    // Eventos de clique
    $(function()
    {
      // Iniciar uma nova chamada
      $('#make-call').click(function()
      {
        // Requisita uma chamada para o ID indicado
        var call = peer.call($('#callto-id').val(), window.localStream);
        // Cria chamada entre os dois
        createCall(call);
      });


      // Finalizar uma chamada
      $('#end-call').click(function()
      {
        // Fecha conexão (chamada) existente
        window.existingCall.close();
        // Espera por uma nova ação
        waitingAction();
      });


      // Tentar ativar site novamente
      $('#getPermissionAndStream-retry').click(function()
      {
        // oculta o erro
        $('#getPermissionAndStream-error').hide();
        // pega novamente permissão para dispositivos de saida e entrada
        getPermissionAndStream();
      });

      // No inicio do site, requisita acesso a dispositivos
      getPermissionAndStream();
    });


    // Preparação, pegando permissão de camera e microfone
    function getPermissionAndStream () 
    {
      // Tenta pegar dispositivo de audio e video
      navigator.getUserMedia({audio: true, video: true}, function(stream)
      {
        // Associa elemento HTML com o dispositivo de video capturado
        $('#my-video').prop('src', URL.createObjectURL(stream));

        // Pega dispositovos encontrados
        window.localStream = stream;
        // Aguarda ação
        waitingAction();
      }, function()
      { 
        // se houver algum erro mostra o erro
        $('#getPermissionAndStream-error').show(); 
      });
    }

    // Aguardar ação
    function waitingAction () 
    {
      // Esconde tela de criar uma chamada
      $('#getPermissionAndStream, #createCall').hide();
      // Mostra tela de esperar ação
      $('#waitingAction').show();
    }

    // Cria uma chamada
    function createCall (call) 
    {
      // Fecha chamada existente se existir
      if (window.existingCall) 
      {
        window.existingCall.close();
      }

      // Aguarda sinal de dispositivo fisico para criar chamada
      call.on('stream', function(stream)
      {
        // Adiciona dispositivo fisico do destinatario a tela do usuário
        $('#their-video').prop('src', URL.createObjectURL(stream));
      });

      // Define como chamada atual
      window.existingCall = call;
      // Adiciona um peer na página
      $('#their-id').text(call.peer);
      // define achão close como esperar uma ação
      call.on('close', waitingAction);
      // Exibe tela para criar chamada
      $('#getPermissionAndStream, #waitingAction').hide();
      $('#createCall').show();
    }

  </script>


</head>

<body>

  <div class="pure-g">

      <!-- Area de visão -->
      <div class="pure-u-2-3" id="video-container">
        <!-- Video do outro usuário -->
        <video id="their-video" autoplay></video>
        <!-- Video do proprio usuário -->
        <video id="my-video" muted="true" autoplay></video>
      </div>

      <!-- Visões -->
      <div class="pure-u-1-3">
        <h2>PeerJS Video Chamada</h2>

        <!-- Esperando por permissão de dispositivos externos-->
        <div id="getPermissionAndStream">
          <p>Por favor, permita que acessemos seu dispositivo de camera e microfone, apra isso clique em "Permitir".</p>
          <!-- Erro ao pedir permissão -->
          <div id="getPermissionAndStream-error">
            <p>Opsss.. ocorreu um erro ao acessar sua camera ou microfone. Verifique se o servidor está ativo, com SSL e se você deu a permissão para acessar-mos esses dispositivos.</p>
            <a href="#" class="pure-button pure-button-error" id="getPermissionAndStream-retry">Tentar novamente</a>
          </div>
        </div>

       <!-- Tela para fazer ligação -->
        <div id="waitingAction">
          <p>Seu ID: <span id="my-id">...</span></p>
          <p>Compartilhe esse ID para que outros membros possam falar com você.</p>
          <h3>Fazer ligação</h3>
          <div class="pure-form">
            <input type="text" placeholder="Call user id..." id="callto-id">
            <a href="#" class="pure-button pure-button-success" id="make-call">Ligar</a>
          </div>
        </div>

        <!-- Chamada ativo, tela para finalizar -->
        <div id="createCall">
          <p>Em chamada com <span id="their-id">...</span></p>
          <p><a href="#" class="pure-button pure-button-error" id="end-call">Finalizar</a></p>
        </div>
      </div>
  </div>


</body>
</html>