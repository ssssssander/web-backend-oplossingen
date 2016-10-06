<?php
	$fruit = "ananas";
	$fruitLaatsteA = strrpos($fruit, "a");
	$fruitHoofdletters = strtoupper($fruit);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $fruitLaatsteA ?></p>
		<p><?= $fruitHoofdletters ?></p>
	</body>
</html>