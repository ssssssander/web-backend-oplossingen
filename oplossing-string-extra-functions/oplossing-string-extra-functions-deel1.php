<?php
	$fruit = "kokosnoot";
	$fruitLengte = strlen($fruit);
	$fruitEersteO = strpos($fruit, "o");
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $fruitLengte ?></p>
		<p><?= $fruitEersteO ?></p>
	</body>
</html>