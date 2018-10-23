<?
include_once("config.php");
include_once("Class.chat.php");
$chat = new Conversas;
?>
<style>
	#usuarios {
	border: dashed 1px;
	
	}

</style>

<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
</script>
<body onload="JavaScript:timedRefresh(<? echo $Refresh; ?>);">


<table valign='top' align='center' width='100%'>
	<tr>
		<td align='left'>
<div id='usuarios' >
<? $chat->Atualizar(); ?>
</div>	
	</td>
		<td valign='top' width='150px' align='right'><div id='usuarios' >		
<div align='center'><b>Usuarios Online</b></div>
<hr>
<div align='center'><? $chat->UserOnline(); ?></div>
</div>
		</td>
	</tr>
</table>