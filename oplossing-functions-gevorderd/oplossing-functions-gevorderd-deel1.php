<?php
	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";

	function md5Static($needle) {
		static $md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
		$md5HashKeyArray = str_split($md5HashKey);
		$arrayCount = array_count_values($md5HashKeyArray);
		$percentage = ($arrayCount[$needle] / count($md5HashKeyArray)) * 100 . "%";
		return "Functie 1: De needle " . $needle . " komt " . $percentage . " voor in de hash key '" . $md5HashKey . "'";
	}

	function md5Global($needle) {
		global $md5HashKey;
		$md5HashKeyArray = str_split($md5HashKey);
		$arrayCount = array_count_values($md5HashKeyArray);
		$percentage = ($arrayCount[$needle] / count($md5HashKeyArray)) * 100 . "%";
		return "Functie 2: De needle " . $needle . " komt " . $percentage . " voor in de hash key '" . $md5HashKey . "'";
	}

	function md5Regular($needle) {
		$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
		$md5HashKeyArray = str_split($md5HashKey);
		$arrayCount = array_count_values($md5HashKeyArray);
		$percentage = ($arrayCount[$needle] / count($md5HashKeyArray)) * 100 . "%";
		return "Functie 3: De needle " . $needle . " komt " . $percentage . " voor in de hash key '" . $md5HashKey . "'";
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?php echo md5Static("2") ?></p>
		<p><?php echo md5Global("8") ?></p>
		<p><?php echo md5Regular("a") ?></p>
	</body>
</html>