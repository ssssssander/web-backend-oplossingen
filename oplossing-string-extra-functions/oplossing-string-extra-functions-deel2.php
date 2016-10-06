<?php
	$fruit = "ananas";
	$laatsteA = strrpos($fruit, "a");
	$fruitHoofdletters = strtoupper($fruit);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $laatsteA ?></p>
		<p><?= $fruitHoofdletters ?></p>
	</body>
</html>