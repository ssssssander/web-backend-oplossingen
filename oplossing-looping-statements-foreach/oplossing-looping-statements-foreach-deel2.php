<?php
	$text = file_get_contents("http://web-backend.local/cursus/opdrachten/opdracht-looping-statements-foreach/text-file.txt");
	$textChars = str_split($text);
	$alfabet = range("a", "z");

	$textCharsAlleenAlfabet = array();

	for($i = 0; $i < count($textChars); $i++) {
		for($j = 0; $j < count($alfabet); $j++) {
			if($textChars[$i] == $alfabet[$j]) {
				array_push($textCharsAlleenAlfabet, $textChars[$i]);
			}
		}
	}
	$textCharsAlleenAlfabet = array_map('strtolower', $textCharsAlleenAlfabet);
	sort($textCharsAlleenAlfabet);

	$uniekeChars = array_unique($textCharsAlleenAlfabet);
	$uniekeChars = array_values($uniekeChars);

	$arrayCount = array_count_values($textCharsAlleenAlfabet);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>Er komen <?= count($uniekeChars) ?> unieke letters van het alfabet voor</p>
		<ul>
			<?php for($i = 0; $i < count($uniekeChars); $i++): ?>
				<li><?php echo $uniekeChars[$i] ?> komt <?php echo $arrayCount[$uniekeChars[$i]] ?> keer voor</li>
			<?php endfor ?>
		</ul>
	</body>
</html>