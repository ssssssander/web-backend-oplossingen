<?php
	$dierenNumeriek = array("Kat", "Konijn", "Wasbeer", "Tijger", "Jaguar", "IJsbeer", "Varken", "Paard", "Schildpad", "Jakhals");
	$dierenAssociatief = array("Kat" => "Kat", "Konijn" => "Konijn", "Wasbeer" => "Wasbeer", "Tijger" => "Tijger", "Jaguar" => "Jaguar", "IJsbeer" => "IJsbeer", "Varken" => "Varken", "Paard" => "Paard", "Schildpad" => "Schildpad", "Jakhals" =>"Jakhals");

	$voertuigen = array("Landvoertuigen" => array("Vespa", "Fiets"), "Watervoertuigen" => array("Surfplank", "Vlot", "Schoener", "Driemaster"), "Luchtvoertuigen" => array("Luchtballon", "Helicopter", "B52"));
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><pre><?= var_dump($voertuigen) ?></pre></p>
	</body>
</html>