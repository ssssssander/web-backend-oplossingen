<?php
	$voornaam = "Sander";
	$achternaam = "Borret";
	$volledigeNaam = $voornaam . " " . $achternaam;
	$volledigeNaamLengte = strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $volledigeNaam ?></p>
		<p><?= $volledigeNaamLengte ?></p>
	</body>
</html>