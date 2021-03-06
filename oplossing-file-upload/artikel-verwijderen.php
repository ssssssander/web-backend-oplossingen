<?php
	session_start();

	if(isset($_GET["artikel"])) {
		try {
			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-file-upload", "root", "Ikzagtweeberenbroodjessmeren",
					array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$archiveQueryString = 	"UPDATE artikels
									SET is_archived = 1
									WHERE id = :id";

			$archiveStatement = $db->prepare($archiveQueryString);
			$archiveStatement->bindValue(":id", $_GET["artikel"]);

			if($archiveStatement->execute()) {
				setNotification("message", "Het artikel werd succesvol verwijderd", "artikel-wijzigen-form.php");
			}
			else {
				setNotification("error", "Er ging iets mis bij het verwijderen van het artikel", "artikel-wijzigen-form.php");
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