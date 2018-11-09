<?php
$cor_fundo = '#FFFFFF';
//$cor_texto = '#0033897';
//$imagem_link = '../img/link.jpg'
?>
#login1 {
  background: #EF4A25;
  border-radius: 9px;
  width: 650px;
  height: 407px;
  margin:11.2% 35%;
  position: relative;	
  font-size: 12px;
  font-family: cursive;
}

#sala2 {
  background: #6D6E71;
   position: relative;	
  font-size: 12px;
  font-family: cursive;
}


#sala1 {
  background: #EF4A25;
  position: relative;	
  font-size: 12px;
  font-family: cursive;
}
body {
background: <?php echo $cor_fundo; ?>;
}

p.texto {
font-family: Verdana, Arial, serif;
color: <?php echo $cor_texto; ?>;
font-size: 12px;
}

a.especial {
text-decoration: none;
background: white url('<?php echo $imagem_link; ?>') 0px 0px no-repeat;
}

.botao01 .enviar {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.butn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

button.css3button {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #ffffff;
	padding: 10px 20px;
	background: -moz-linear-gradient(
		top,
		#fff3db 0%,
		#6d6e71 21%,
		#6d6e71);
	background: -webkit-gradient(
		linear, left top, left bottom,
		from(#fff3db),
		color-stop(0.21, #6d6e71),
		to(#6d6e71));
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	border: 1px solid #0f0f0f;
	-moz-box-shadow:
		0px 1px 3px rgba(000,000,000,0.5),
		inset 0px -1px 0px rgba(227,170,171,0.7);
	-webkit-box-shadow:
		0px 1px 3px rgba(000,000,000,0.5),
		inset 0px -1px 0px rgba(227,170,171,0.7);
	box-shadow:
		0px 1px 3px rgba(000,000,000,0.5),
		inset 0px -1px 0px rgba(227,170,171,0.7);
	text-shadow:
		0px -1px 1px rgba(000,000,000,0.2),
		0px 1px 0px rgba(255,255,255,0.3);
}
