<?php
	session_start();

	spl_autoload_register(function ($className) {
	    include "classes/" . $className . ".php";
	});

	$isValid = false;
	$messageOutput = false;
	$messageObject = new Message();

	try {
		if(isset($_POST["submit"])) {
			if(isset($_POST["code"])) {
				if(strlen($_POST["code"]) == 8) {
					$isValid = true;
				}
				else {
					throw new ExceptionImproved(array("VALIDATION-CODE-LENGTH", $_POST["code"]));
				}
			}
			else {
				throw new ExceptionImproved(array("SUBMIT-ERROR"));
			}
		}
	}
	catch(ExceptionImproved $e) {
		$messageCode = $e->getMessageArray()[0];
		if(array_key_exists(1, $e->getMessageArray())) {
			$wrongCode = $e->getMessageArray()[1];
		}
		$message = array();
		$createMessage = false;

		switch($messageCode) {
			case "SUBMIT-ERROR": 			$message["type"] = "error";
											$message["text"] = "Er werd met het formulier geknoeid";
											$message["wrongCode"] = "";
											break;
			case "VALIDATION-CODE-LENGTH": 	$message["type"] = "error";
											$message["text"] = "De kortingscode heeft niet de juiste lengte";
											$message["wrongCode"] = ", de foute kortingscode was '" . $wrongCode . "'";
											$createMessage = true;
											break;
		}
		logToFile($message);

		if($createMessage) {
			$messageObject->setMessage($message);
		}

		$messageOutput = $messageObject->getMessage();
	}

	function logToFile($message) {
		$date = date("H:i:s d/m/Y");
		$ip = $_SERVER["REMOTE_ADDR"];
		$errorString = "[" . $date . "] - " . $ip . " - type:[" . $message["type"] . "] " . $message["text"] . $message["wrongCode"] ."\n\r";

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
		<?php if($messageOutput): ?>
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