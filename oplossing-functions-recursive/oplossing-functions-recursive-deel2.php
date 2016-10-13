<?php
	function berekenHoeveelGeldOver($geld, $jaren, $rentevoet, $jarenTeller = 0, $text = "") {
		++$jarenTeller;
		$geldOver = $geld + ($geld * $rentevoet);

		$text .= nl2br("Na " . $jarenTeller . " jaren heb je nog " . round($geldOver) . " euro over\n");
		
		if($jarenTeller >= $jaren) {
			return $text;
		}
		return berekenHoeveelGeldOver($geldOver, $jaren, $rentevoet, $jarenTeller, $text);
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= berekenHoeveelGeldOver(250, 20, 0.1) ?></p>
		<p><?= berekenHoeveelGeldOver(23000, 5, 0.02) ?></p>
	</body>
</html>