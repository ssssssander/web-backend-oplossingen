<?php
	function berekenHoeveelGeldOver($geld) {
		static $jarenTeller = 0;
		static $text = "";
		$rentevoet = 0.08;
		$jaren = 10;

		++$jarenTeller;
		$geldOver = $geld + ($geld * $rentevoet);

		$text .= nl2br("Na " . $jarenTeller . " jaren heb je nog " . round($geldOver) . " euro over\n");

		if($jarenTeller >= $jaren) {
			return $text;
		}
		return berekenHoeveelGeldOver($geldOver);
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= berekenHoeveelGeldOver(100000) ?></p>
	</body>
</html>