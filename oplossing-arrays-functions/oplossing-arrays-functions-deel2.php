<?php
	$dieren = array("Havik", "Uil", "Duif", "Arend", "Valk", "Luipaard", "Zeehond");
	sort($dieren);
	$zoogdieren = array("Vleermuis", "Chimpansee", "Eekhoorn");
	$dierenLijst = array_merge($dieren, $zoogdieren);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><pre><?= var_dump($dieren) ?></pre></p>
		<p><pre><?= var_dump($dierenLijst) ?></pre></p>
	</body>
</html>