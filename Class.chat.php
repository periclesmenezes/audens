<?php
ob_start();
include_once("funcao.php");
include_once("config.php");


class Conversas {
	var $conversa;

		function Adicionar($conversa, $destino){
		setcookie("destino", $destino);
		
		$this->conversa = AntiSql($conversa);
		$this->destino = AntiSql($destino);
		if(empty($this->conversa)){
		echo "<script>alert('ERRO conversa nao pode ficar vasia'); location.href='index.php'; </script>";
		exit;
		}
		$usuario = "<font color=\'$_COOKIE[cor_preferida]\'>$_COOKIE[usuario]</font>";
		$data = date("Y/m/d H:i");
		$conversa = mysql_query("INSERT INTO conversas values ('','$usuario','$destino', '$this->conversa', '$data','".time()."') ");
		if($conversa){
		header("Location: index.php");
		
		}else{
		echo "erro nao esperado";
		}
		}
		
			function Atualizar(){

			$tempo = time()-1200;
			$conversa = mysql_query("SELECT * FROM conversas
									WHERE									
									usuario LIKE '%$_COOKIE[usuario]%' OR
									usuario = 'sistema' OR
									destino LIKE '%$_COOKIE[usuario]%' or
									destino = 'todos' HAVING
									 time > '$tempo'									
									order by cod_conversa Desc");
			
			$smiles = mysql_query("SELECT * FROM emoticons ");
			$countSmiles = mysql_num_rows($smiles);
			$x = 0;

			
			
			while($resSmiles = mysql_fetch_assoc($smiles)){
			$atalho[] = $resSmiles['atalho'];
			$caminho[] = " <img src='emoticon/".$resSmiles['caminho']."' /> ";
			}
			
			
			
			while($res = mysql_fetch_assoc($conversa)){
				if(strtolower($res['destino']) !== "sistema" && strtolower($res['destino']) !== "todos" ){
				echo "<b>".$res['usuario']." <font color='#00ff00'> -> $res[destino] (reservado) </font>  </b> - ";
				}else{
				echo "<b>".$res['usuario']."</b> - ";
				}
				
				
				echo str_replace($atalho, $caminho, $res['conversa']) ;
				echo "</br>";
			
			}
		
		}
		
		function UserOnline(){
		$tempo = time();
		$tempoFinal = time()- 6;
		mysql_query("DELETE FROM online where time <'$tempoFinal' ");
		
		$sql = mysql_query("SELECT * FROM online where usuario='$_COOKIE[usuario]' ");
		$cont = mysql_num_rows($sql);
			if($cont == 0){
			mysql_query("INSERT into online VALUES ('','$_COOKIE[usuario]', '$tempo' )");
			}else{
			mysql_query("UPDATE online SET time='$tempo' WHERE usuario='$_COOKIE[usuario]' ");	
			}
		
		$usuarios = mysql_query("SELECT * FROM online order by usuario asc");
		while($res = mysql_fetch_assoc($usuarios)){

			echo "<b>".$res['usuario']."</b></br>";
		
		}		
		
		
		}
		
		function ListaOnline(){
		$tempo = time();
		$tempoFinal = time()- 6;
		mysql_query("DELETE FROM online where time < '$tempoFinal' ");
		
		$sql = mysql_query("SELECT * FROM online where usuario='$_COOKIE[usuario]' ");
		$cont = mysql_num_rows($sql);
			if($cont == 0){
			mysql_query("INSERT into online VALUES ('','$_COOKIE[usuario]', '$tempo' )");
			}else{
			mysql_query("UPDATE online SET time='$tempo' WHERE usuario='$_COOKIE[usuario]' ");	
			}
		
		$usuarios = mysql_query("SELECT * FROM online order by usuario asc");
		while($res = mysql_fetch_assoc($usuarios)){
			if($res['usuario'] == $_COOKIE['destino']){
			echo "<option selected='selected' value='".$res['usuario']."'>$res[usuario]</option>";
				}else{
			echo "<option value='".$res['usuario']."'>$res[usuario]</option>";				
			}
		
		
		}		
		
		
		}
		
		

}

if(isset($_GET['ListaOnline'])){
$lista = new Conversas();
$lista->ListaOnline();
}

?>