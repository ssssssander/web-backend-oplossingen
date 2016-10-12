<?php
	function berekenSom($getal1, $getal2) {
		$som = $getal1 + $getal2;
		return $som;
	}

	function vermenigvuldig($getal1, $getal2) {
		$product = $getal1 * $getal2;
		return $product;
	}

	function isEven($getal) {
		if($getal % 2 == 0) {
			return true;
		}
		else {
			return false;
		}
	}

	function lengteEnHoofdletters($text) {
		$resultaten = array(strlen($text), strtoupper($text));
		return $resultaten;
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?php echo berekenSom(51, 7); ?></p>
		<p><?php echo vermenigvuldig(33, 3); ?></p>
		<p><?php echo isEven(26) ? "true" : "false"; ?></p>
		<?php $string = "Who is your daddy and what does he do?"; ?>
		<p><?php echo lengteEnHoofdletters($string)[0]; ?></p>
		<p><?php echo lengteEnHoofdletters($string)[1]; ?></p>
	</body>
</html>