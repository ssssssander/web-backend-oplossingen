<?php
	$getal = 5;
	$dagen = array("maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag", "zondag");
	for($i = 1; $i < 7; $i++) {
		if($getal == $i) {
			$dag = $dagen[$i-1];
		}
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $dag ?></p>
	</body>
</html>