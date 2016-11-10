<?php
	session_start();

	spl_autoload_register(function ($className) {
	    include "classes/" . $className . ".php";
	});

	$createMessage = false;
	$isValid = false;

	$messageObject = new Message();

	try {
		if(isset($_POST["submit"])) {
			if(isset($_POST["code"])) {
				if(strlen($_POST["code"]) == 8) {
					$isValid = true;
				}
				else {
					throw new Exception("VALIDATION-CODE-LENGTH", 2);
				}
			}
			else {
				throw new Exception("SUBMIT-ERROR", 1);
			}
		}
	}
	catch(Exception $e) {
		$messageCode = $e->getCode();
		$message = array();

		switch($messageCode) {
			case 1: $message["type"] = "error";
					$message["text"] = "Er werd met het formulier geknoeid";
					$createMessage = true;
					break;
			case 2: $message["type"] = "error";
					$message["text"] = "De kortingscode heeft niet de juiste lengte";
					$createMessage = true;
					break;
		}
		logToFile($message);

		if($createMessage) {
			$messageObject->createMessage($message);
		}

		$messageOutput = $messageObject->showMessage();
	}

	function logToFile($message) {
		$timestamp = time();
		$errorString = "[" . date("H:i:s d/m/Y") . "] - " . $_SERVER["REMOTE_ADDR"] . " - " .
		key($message) . ":[" . $message["type"] . "] " . $message["text"] . "\n\r";

		file_put_contents("log.txt", $errorString, FILE_APPEND);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			input {
				display: block;
			}
			.error {
				color: #831f1d;
				background-color: #ea9494;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<h1>Geef uw kortingscode op</h1>
		<?php if($createMessage): ?>
			<p class="<?= $messageOutput["type"] ?>"><?= $messageOutput["text"] ?></p>
		<?php endif ?>
		<?php if($isValid): ?>
			<p>Korting toegekend!</p>
		<?php else: ?>
			<form action="" method="post">
				<label for="code">Kortingscode</label><input type="text" name="code" id="code">
				<input type="submit" name="submit">
			</form>
		<?php endif ?>
	</body>
</html>