<?php
	$text = file_get_contents("http://web-backend.local/cursus/opdrachten/opdracht-looping-statements-foreach/text-file.txt");
	$textChars = str_split($text);
	rsort($textChars);
	$omgedraaideTextChars = array_reverse($textChars);
	$omgedraaideTextCharsLengte = count($omgedraaideTextChars);

	$uniekeChars = array_unique($omgedraaideTextChars);
	$uniekeChars = array_values($uniekeChars);
	// OF
	// for($i = 0; $i < $omgedraaideTextCharsLengte; $i++) {
	// 	if(!in_array($omgedraaideTextChars[$i], $uniekeChars)) {
	// 		array_push($uniekeChars, $omgedraaideTextChars[$i]);
	// 	}
	// }
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>Er komen <?= count($uniekeChars) ?> unieke karakters voor</p>
		<ul>
			<?php for($i = 0; $i < count($uniekeChars); $i++): ?>
				<li><?php echo $uniekeChars[$i] ?> komt <?php $arrayCount = array_count_values($omgedraaideTextChars);
				echo $arrayCount[$uniekeChars[$i]] ?> keer voor</li>
			<?php endfor ?>
		</ul>
	</body>
</html>