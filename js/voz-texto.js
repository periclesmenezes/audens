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
