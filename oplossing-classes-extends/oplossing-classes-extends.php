<?php
	spl_autoload_register(function ($className) {
	    include "classes/" . $className . ".php";
	});

	$cat = new Animal("Snuffles", "female", 100);
	$baboon = new Animal("Bobo", "male", 60);
	$horse = new Animal("Jackie", "male", 90);

	$cat->changeHealth(-20);
	$baboon->changeHealth(40);

	$simba = new Lion("Simba", "male", 50, "Congo lion");
	$scar = new Lion("Scar", "male", 40, "Kenia lion");

	$zeke = new Zebra("Zeke", "male", 80, "Quagga");
	$zana = new Zebra("Zeke", "female", 70, "Selous");
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Instanties van de Animal class</h1>
		<p><?= $cat->getName() ?> is van het geslacht <?= $cat->getGender() ?> en heeft momenteel <?= $cat->getHealth() ?> levenspunten (special move: <?= $cat->doSpecialMove() ?>)</p>
		<p><?= $baboon->getName() ?> is van het geslacht <?= $baboon->getGender() ?> en heeft momenteel <?= $baboon->getHealth() ?> levenspunten (special move: <?= $baboon->doSpecialMove() ?>)</p>
		<p><?= $horse->getName() ?> is van het geslacht <?= $horse->getGender() ?> en heeft momenteel <?= $horse->getHealth() ?> levenspunten (special move: <?= $horse->doSpecialMove() ?>)</p>

		<h1>Specifieke dierenklassen die gebaseerd zijn op de Animal class</h1>
		<h1>Leeuwen</h1>
		<p>De speciale move van <?= $simba->getName() ?> (soort: <?= $simba->getSpecies() ?>): <?= $simba->doSpecialMove() ?></p>
		<p>De speciale move van <?= $scar->getName() ?> (soort: <?= $scar->getSpecies() ?>): <?= $scar->doSpecialMove() ?></p>
		
		<h1>Zebra's</h1>
		<p>De speciale move van <?= $zeke->getName() ?> (soort: <?= $zeke->getSpecies() ?>): <?= $zeke->doSpecialMove() ?></p>
		<p>De speciale move van <?= $zana->getName() ?> (soort: <?= $zana->getSpecies() ?>): <?= $zana->doSpecialMove() ?></p>
	</body>
</html>