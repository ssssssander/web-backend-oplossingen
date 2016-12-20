<?php
	session_start();

	if(isset($_GET["artikel"])) {
		try {
			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-file-upload", "root", "Ikzagtweeberenbroodjessmeren",
					array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$toggleActiveQueryString = 	"UPDATE artikels
										SET is_active = 1 - is_active
										WHERE id = :id";

			$toggleActiveStatement = $db->prepare($toggleActiveQueryString);
			$toggleActiveStatement->bindValue(":id", $_GET["artikel"]);

			if($toggleActiveStatement->execute()) {
				setNotification("message", "Het artikel werd succesvol geactiveerd/gedeactiveerd",
					"artikel-wijzigen-form.php?artikel={$_GET['artikel']}");
			}
			else {
				setNotification("error", "Er ging iets mis bij het activeren/deactiveren van het artikel", "artikel-wijzigen-form.php");
			}
		}
		catch (PDOException $e) {
			setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage(), "artikel-wijzigen-form.php");
		}
	}

	function setNotification($type, $message, $location) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: " . $location);
	}
?>