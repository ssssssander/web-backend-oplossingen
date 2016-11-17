<?php
	$pigHealth = 5;
	$maximumThrows = 8;

	function calculateHit() {
		global $pigHealth;
		$hitChance = rand(0, 99);

		if($pigHealth == 0) {
			return;
		}

		if($hitChance < 40) {
			--$pigHealth;
			if($pigHealth == 1) {
				return "Raak! Er is nog maar " . $pigHealth . " varken over.";
			}
			else {
				return "Raak! Er zijn nog maar " . $pigHealth . " varkens over.";
			}
		}
		else {
			if($pigHealth == 1) {
				return "Mis! Nog " . $pigHealth . " varken in het team.";
			}
			else {
				return "Mis! Nog " . $pigHealth . " varkens in het team.";
			}
		}
	}

	function launchAngryBird() {
		global $pigHealth, $maximumThrows;
		static $timesCalled = 1;
		static $messages = array();

		array_push($messages, calculateHit());

		if($timesCalled < $maximumThrows) {
			++$timesCalled;
			return launchAngryBird();
		}
		else {
			if($pigHealth == 0) {
				array_push($messages, "Gewonnen!");
			}
			else {
				array_push($messages, "Verloren!");
			}
		return $messages;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php foreach(launchAngryBird() as $message): ?>
			<p><?= $message ?></p>
		<?php endforeach ?>
	</body>
</html>