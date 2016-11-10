<?php
	$flatArray = array("Jan", "Jaap", "Joris", "Jonas");
	$multiArray = array(
		"computerMerken" => array("HP", "Acer", "Asus", "Sony", "Apple", "Microsoft"),
		"playstationGames" => array("God of War", "Uncharted", "Ratchet & Clank")
	);
	$html = "<html><head></head><body>AAAAAA</body></html>";

	function drukArrayAf($array) {
		$outputArray = array();

		foreach($array as $innerArrayKey => $innerArray) {
			if(is_array($innerArray)) {
				foreach($innerArray as $valueKey => $value) {
					array_push($outputArray, $innerArrayKey . "[ " . $valueKey . " ] heeft waarde '" . $value . "'");
				}
			}
			else {
				$valueKey = $innerArrayKey;
				$value = $innerArray;
				array_push($outputArray, "array[ " . $valueKey . " ] heeft waarde '" . $value . "'");
			}
		}
		return $outputArray;
	}
	$flatArrayOutput = drukArrayAf($flatArray);
	$multiArrayOutput = drukArrayAf($multiArray);

	function validateHtmlTag($html) {
		$openingTag = "<html>";
		$closingTag = "</html>";

		return ((strpos($html,$openingTag) === 0) && (strpos($html, $closingTag, strlen($html) - strlen($closingTag)) !== false));
	}
	$isValid = validateHtmlTag($html);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php foreach($flatArrayOutput as $outputItem): ?>
			<p><?= $outputItem ?></p>
		<?php endforeach ?>
		<?php foreach($multiArrayOutput as $outputItem): ?>
			<p><?= $outputItem ?></p>
		<?php endforeach ?>
		<p><code><?= htmlentities($html) ?></code> is <?= $isValid ? "geldig" : "niet geldig" ?></p>
	</body>
</html>