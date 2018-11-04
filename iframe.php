<?php
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
	function timedRefresh(timeoutPeriod) {
		setTimeout("location.reload(true);",timeoutPeriod);
	}
</script>

<body onload="JavaScript:timedRefresh(<?php echo $Refresh; ?>);"></body>

<table valign='top' align='center' width='100%'>
	<tr>
		<td align='left'>
			<div id='usuarios' >
				<?php $chat->Atualizar(); ?>
			</div>	
		</td>
	</tr>
</table>