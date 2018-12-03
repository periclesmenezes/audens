

<link rel="stylesheet" href="css/sala1.php" type="text/css" />
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
<center>
<?php $chat->UserOnline(true); ?>
</center>
