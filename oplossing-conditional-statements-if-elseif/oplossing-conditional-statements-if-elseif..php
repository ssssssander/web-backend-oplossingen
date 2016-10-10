<?php
	$getal = 42;
	$tientallen = [];
	for($i = 0; $i <= 100; $i+=10) {
		$tientallen[] = $i;
	}
	for($i = 0; $i < count($tientallen); $i++) {
		if($getal > $tientallen[$i]) {
			$resultaat = "Het getal ligt tussen " . $tientallen[$i] . " en " . $tientallen[$i+1];
		}
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $resultaat ?></p>
		<p><?= strrev($resultaat) ?></p>
	</body>
</html>