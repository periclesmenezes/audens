<?
include_once("config.php");

class Emoticon {


	function Gerar(){
	$sql = mysql_query("SELECT * FROM emoticons WHERE flg_ativo = '1' ");
	$x = 0;
		
	
	while($res = mysql_fetch_assoc($sql)){
		if( ($x%20) == 0){
		echo "<br>";
		}
		echo "<a href='#' onclick=\"javascript:document.getElementById('chatear').value += '$res[atalho]' ;\" ><img src='emoticon/$res[caminho]' /></a> " ;	
		$x = $x+1;
		}	
	
	}
	}

?>