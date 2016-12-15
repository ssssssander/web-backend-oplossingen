<?php
	session_start();

	if(isset($_POST["submit"])) {
		try {
			$originalDateFormat = explode("-", $_POST["date"]);
			$newDateFormat = array_reverse($originalDateFormat);
			$newDateFormat = implode("-", $newDateFormat);

			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-crud-cms", "root", "Ikzagtweeberenbroodjessmeren",
					array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$addArticleQueryString = 	"INSERT INTO artikels (titel, artikel, kernwoorden, datum)
										VALUES (:title, :article, :keywords, :date)";

			$addArticleStatement = $db->prepare($addArticleQueryString);
			$addArticleStatement->bindValue(":title", $_POST["title"]);
			$addArticleStatement->bindValue(":article", $_POST["article"]);
			$addArticleStatement->bindValue(":keywords", $_POST["keywords"]);
			$addArticleStatement->bindValue(":date", $newDateFormat);

			if($addArticleStatement->execute()) {
				setNotification("message", "Het artikel werd succesvol toegevoegd", "artikel-overzicht.php");
			}
			else {
				setNotification("error", "Het artikel kon niet toegevoegd worden.", "artikel-toevoegen-form.php");
			}
		}
		catch (PDOException $e) {
			setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage(), "artikel-toevoegen-form.php");
		}
	}

	function setNotification($type, $message, $location) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: " . $location);
	}
?>