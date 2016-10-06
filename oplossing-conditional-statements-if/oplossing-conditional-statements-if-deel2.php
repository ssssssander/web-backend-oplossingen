<?php
	$getal = 1;
	$dagen = array("maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag", "zondag");
	for($i = 1; $i < 7; $i++) {
		if($getal == $i) {
			$dag = $dagen[$i-1];
			$dagHoofdletters = strtoupper($dag);
			$teVervangenLetter = "A";
			$dagHoofdlettersBehalveA = str_replace($teVervangenLetter, strtolower($teVervangenLetter), $dagHoofdletters);
			$positieLaatsteA = strrpos($dagHoofdletters, $teVervangenLetter);
			$dagHoofdlettersBehalveLaatsteA = substr_replace($dagHoofdletters, strtolower($teVervangenLetter), $positieLaatsteA, 1);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $dagHoofdletters ?></p>
		<p><?= $dagHoofdlettersBehalveA ?></p>
		<p><?= $dagHoofdlettersBehalveLaatsteA ?></p>
	</body>
</html>