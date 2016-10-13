<?php
	$array = array("HP", "Acer", "Asus", "Sony", "Apple", "Microsoft");
	function drukArrayAf($array) {
		$output = "";
		for($i = 0; $i < count($array); $i++) {
			$output .= nl2br("merken[ " . $i . " ] heeft waarde '" . $array[$i] . "'\n");
		}
		return $output;
	}

	// Niet af
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= drukArrayAf($array) ?></p>
	</body>
</html>