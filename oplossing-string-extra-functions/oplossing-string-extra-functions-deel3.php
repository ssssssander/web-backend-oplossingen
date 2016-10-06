<?php
	$lettertje = "e";
	$cijfertje = 3;
	$langsteWoord = "zandzeepsodemineralenwatersteenstralen";
	$resultaat = str_replace($lettertje, $cijfertje, $langsteWoord);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $resultaat ?></p>
	</body>
</html>