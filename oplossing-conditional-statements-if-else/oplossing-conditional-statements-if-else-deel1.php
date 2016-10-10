<?php
	$jaartal = 2005;
	if(($jaartal % 4 == 0 && $jaartal % 100 != 0) || $jaartal % 400 == 0) {
		$schrikkeljaar = $jaartal . " is een schrikkeljaar";
	}
	else {
		$schrikkeljaar = $jaartal . " is geen schrikkeljaar";
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $schrikkeljaar ?></p>
	</body>
</html>