<?php
	include_once("config.php");
	include_once("Class.chat.php");
	$chat = new Conversas;
?>
<script type="text/JavaScript">
	function timedRefresh(timeoutPeriod) {
		setTimeout("location.reload(true);",timeoutPeriod);
	}
</script>

<link rel="stylesheet" href="css/estilo.css" type="text/css" />

<body onload="JavaScript:timedRefresh(<?php echo $Refresh; ?>);"> </body>

<?php $chat->UserOnline(true); ?>
