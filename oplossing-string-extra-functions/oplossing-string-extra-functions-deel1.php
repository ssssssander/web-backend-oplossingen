<?php
	$fruit = "kokosnoot";
	$fruitLengte = strlen($fruit);
	$eersteO = strpos($fruit, "o");
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $fruitLengte ?></p>
		<p><?= $eersteO ?></p>
	</body>
</html>