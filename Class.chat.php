<link rel="stylesheet" href="css/estilo.php" type="text/css" />
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
			echo "<script>alert('ERRO conversa nao pode ficar vazia'); location.href='index.php'; </script>";
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
		$conversa = mysql_query("SELECT * 
								   FROM conversas
								  WHERE	usuario LIKE '%$_COOKIE[usuario]%' OR
										usuario = 'sistema' OR
										destino LIKE '%$_COOKIE[usuario]%' OR
										destino = 'todos' 
								 HAVING time > '$tempo'									
								  ORDER BY cod_conversa Desc");
			
		$smiles = mysql_query("SELECT * FROM emoticons ");
		$countSmiles = mysql_num_rows($smiles);
		$x = 0;

		while($resSmiles = mysql_fetch_assoc($smiles)){
			$atalho[] = $resSmiles['atalho'];
			$caminho[] = " <img src='emoticon/".$resSmiles['caminho']."' /> ";
		}
			
		while($res = mysql_fetch_assoc($conversa)){
			if(strtolower($res['destino']) !== "sistema" && strtolower($res['destino']) !== "todos" ){
				echo "<b>".$res['usuario']." <font color='#00ff00'> $res[destino] (reservado) </font>  </b> - ";
			}else{
				echo "<b>".$res['usuario']."</b> - ";
			}
			echo str_replace($atalho, $caminho, $res['conversa']) ;
			echo "</br>";
		}
	}
	
	/*******
	 * Pega a lista de usuários Online no sistema.
	 * 
	 * $tabela - Indica se quer que a saida seja em formato de tabela e como links.
	 * 
	 */
	function UserOnline($tabela = false){
		//Calcula o tempo de Timeout.
		$tempo = time();
		$tempoFinal = time() - 6;
		//Limpa da tabela que atingiu o timeout de inatividade.
		mysql_query("DELETE FROM online where time <'$tempoFinal' ");
		//Atualiza a participação do usuário em Online.
		$sql = mysql_query("SELECT * FROM online where usuario='$_COOKIE[usuario]' ");
		$cont = mysql_num_rows($sql);
		if($cont == 0){
			mysql_query("INSERT into online VALUES ('','$_COOKIE[usuario]', '$tempo' )");
		}else{
			mysql_query("UPDATE online SET time='$tempo' WHERE usuario='$_COOKIE[usuario]' ");	
		}
		//Pega a lista de usuários Online.
		$usuarios = mysql_query("SELECT * FROM online order by usuario asc");
		while($res = mysql_fetch_assoc($usuarios)){
			if($tabela){
				echo "<div align='center'><a href='batepapo.php'>". $res['usuario'] . " </a></div>";

			}else{
				echo "<b>".$res['usuario']."</b></br>";
			}
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