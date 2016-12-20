<?php
	session_start();
	
	if(isset($_POST["submit"]) && isset($_SESSION["articleId"])) {
		if($_SESSION["articleId"] == $_POST["id"]) {
			try {
				$db = 	new PDO("mysql:host=localhost;dbname=opdracht-file-upload", "root", "Ikzagtweeberenbroodjessmeren",
						array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$editQueryString = 	"UPDATE artikels
									SET titel=:title, artikel=:article, kernwoorden=:keywords, datum=:date
									WHERE id = :id AND is_archived = 0";

				$editStatement = $db->prepare($editQueryString);
				$editStatement->bindValue(":title", $_POST["title"]);
				$editStatement->bindValue(":article", $_POST["article"]);
				$editStatement->bindValue(":keywords", $_POST["keywords"]);
				$editStatement->bindValue(":date", $_POST["date"]);
				$editStatement->bindValue(":id", $_POST["id"]);

				if($editStatement->execute()) {
					setNotification("message", "Het artikel werd succesvol gewijzigd", "artikel-overzicht.php");
				}
				else {
					setNotification("error", "Er ging iets mis bij het wijzigen van het artikel", "artikel-wijzigen-form.php");
				}
			}
			catch(PDOException $e) {
				setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage(), "artikel-wijzigen-form.php");
			}
		}
	}

	function setNotification($type, $message, $location) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: " . $location);
	}
?>