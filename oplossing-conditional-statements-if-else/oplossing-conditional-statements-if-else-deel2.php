<?php
	$seconden = 221108521;
	$minuten = $seconden / 60;
	$uren = $minuten / 60;
	$dagen = $uren / 24;
	$weken = $dagen / 7;
	$maanden = $dagen / 31;
	$jaren = $maanden / 12;
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>In <?= $seconden ?> seconden:</p>
		<ul>
			<li><?= round($minuten) ?> minuten</li>
			<li><?= round($uren) ?> uren</li>
			<li><?= round($dagen) ?> dagen</li>
			<li><?= round($weken) ?> weken</li>
			<li><?= round($maanden) ?> maanden</li>
			<li><?= round($jaren) ?> jaren</li>
		</ul>
	</body>
</html>