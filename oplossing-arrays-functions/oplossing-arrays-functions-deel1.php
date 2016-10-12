<?php
	$dieren = array("Havik", "Uil", "Duif", "Arend", "Valk", "Luipaard", "Zeehond");
	$aantalDieren = count($dieren);
	$teZoekenDier = "Uil";
	if(in_array($teZoekenDier, $dieren)) {
		$resultaat = $teZoekenDier . " gevonden";
	}
	else {
		$resultaat = $teZoekenDier . " niet gevonden";
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>Aantal dieren: <?= $aantalDieren ?></p>
		<p><?= $resultaat ?></p>
	</body>
</html>