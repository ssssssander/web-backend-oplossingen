<?php
	session_start();

	$isValid = false;
	$messageOutput = false;

	try {
		if(isset($_POST["submit"])) {
			if(isset($_POST["code"])) {
				if(strlen($_POST["code"]) == 8) {
					$isValid = true;
				}
				else {
					throw new Exception("VALIDATION-CODE-LENGTH");
				}
			}
			else {
				throw new Exception("SUBMIT-ERROR");
			}
		}
	}
	catch(Exception $e) {
		$messageCode = $e->getMessage();
		$message = array();
		$createMessage = false;

		switch($messageCode) {
			case "SUBMIT-ERROR": 			$message["type"] = "error";
											$message["text"] = "Er werd met het formulier geknoeid";
											break;
			case "VALIDATION-CODE-LENGTH": 	$message["type"] = "error";
											$message["text"] = "De kortingscode heeft niet de juiste lengte";
											$createMessage = true;
											break;
		}
		logToFile($message);

		if($createMessage) {
			createMessage($message);
		}

		$messageOutput = showMessage();
	}

	function createMessage($message) {
		$_SESSION["message"]["type"] = $message["type"];
		$_SESSION["message"]["text"] = $message["text"];
	}

	function showMessage() {
		if(isset($_SESSION["message"])) {
			$message["type"] = $_SESSION["message"]["type"];
			$message["text"] = $_SESSION["message"]["text"];
			unset($_SESSION["message"]);
			return $message;
		}
		else {
			return false;
		}
	}

	function logToFile($message) {
		$date = date("H:i:s d/m/Y");
		$ip = $_SERVER["REMOTE_ADDR"];
		$errorString = "[" . $date . "] - " . $ip . " - type:[" . $message["type"] . "] " . $message["text"] . "\n\r";

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