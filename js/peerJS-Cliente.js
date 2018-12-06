    // Variavel para pegar permissão de camera e microfone, definição de acordo com navegador.
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

    // Definições do PeerJS, como dominio, key e outros
    //var peer = new Peer({ host: 'localhost', port:9000, debug: 3});
    //var peer = new Peer();
    var peer = new Peer({ host:'10.20.75.110', port:9000, path:'/'});
    
// Pega ID da conexão atual
peer.on('open', function(id)
                {
                    $('#meu-id').text(id);
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
                        // Aguarda nova conexão ou ação
                        waitingAction();
                    });

 // Eventos de clique
 $(function()
 {
     //Inicia uma nova chamada
     $('#make-call').click(function()
     {
        //Requisita uma chamada para o ID indicado
        var call = peer.call($('#detino-id').val(), window.localStream);
        //Cria uma chamada entre os dois
        createCall(call);
     });

     //Finaliza uma chamada
     $('#end-call').click(function()
     {
        //Fecha a conexão (chamada) existente
        window.existingCall.close();
        //Espera por uma nova ação
        waitingAction();
     });

     //No início do site, requisita acesso a dispositivos
     getPermissionAndStream();
 });
 
// Preparação, pegando permissão de camera e microfone
function getPermissionAndStream () 
{
    // Tenta pegar dispositivo de audio e video
    navigator.getUserMedia({audio: true, video: true}, 
                           function(stream)
                            {
                                // Associa elemento HTML com o dispositivo de video capturado
                                $('#meu-video').prop('src', URL.createObjectURL(stream));

                                // Pega dispositovos encontrados
                                window.localStream = stream;
                                // Aguarda ação
                                waitingAction();
                            }, 
                            function()
                            { 
                                // se houver algum erro mostra o erro
                                //$('#getPermissionAndStream-error').show(); 
                            });
}

// Aguardar ação
function waitingAction () 
{
    // Esconde tela de criar uma chamada
    //$('#getPermissionAndStream, #createCall').hide();
    $('#createCall').hide();
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
                            $('#destino-video').prop('src', URL.createObjectURL(stream));
                        });

    // Define como chamada atual
    window.existingCall = call;
    // Adiciona um peer na página
    $('#chamada-destino').text(call.peer);
    // define ação close como esperar uma ação
    call.on('close', waitingAction);
    // Exibe tela para criar chamada
    $('#waitingAction').hide();
    $('#createCall').show();
}
