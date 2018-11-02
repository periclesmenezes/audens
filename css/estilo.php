<?php
$cor_fundo = '#6D6E71';
//$cor_texto = '#0033897';
//$imagem_link = '../img/link.jpg'
?>
#login1 {
  background: #EF4A25;
  width: 100%;
  height: 191px;
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