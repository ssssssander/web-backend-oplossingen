<?php
	$voornaam = "Sander";
	$achternaam = "Borret";
	$volledigeNaam = $voornaam . " " . $achternaam;
	$volledigeNaamKarakters = strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $volledigeNaam ?></p>
		<p><?= $volledigeNaamKarakters ?></p>
	</body>
</html>