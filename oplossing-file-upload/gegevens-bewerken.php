<?php
	session_start();

	try {
		if(isset($_POST["submit"])) {
			if((($_FILES["profilePicture"]["type"] === "image/gif")
			|| ($_FILES["profilePicture"]["type"] === "image/jpeg")
			|| ($_FILES["profilePicture"]["type"] === "image/png"))
			&& ($_FILES["profilePicture"]["size"] < 2000000)) {
				if($_FILES["profilePicture"]["error"] > 0) {
					throw new Exception("Er ging iets mis bij het uploaden. " . $_FILES["profilePicture"]["error"]);
				}
				else {
					$_FILES["profilePicture"]["name"] = time() . "_" . $_FILES["profilePicture"]["name"];
					define("ROOT", dirname(__FILE__));
					
					while(file_exists(ROOT . "/img/" . $_FILES["profilePicture"]["name"])) {
						$_FILES["profilePicture"]["name"] = time() . "_" . $_FILES["profilePicture"]["name"];
					}

					move_uploaded_file($_FILES["profilePicture"]["tmp_name"], (ROOT . "/img/" . $_FILES["profilePicture"]["name"]));

					$db = 	new PDO("mysql:host=localhost;dbname=opdracht-file-upload", "root", "Ikzagtweeberenbroodjessmeren",
							array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

					$editUserDataQueryString = "UPDATE users
												SET email = :email, profile_picture = :profilePicture
												WHERE email = '" . $_SESSION["email"] . "'";

					$editUserDataStatement = $db->prepare($editUserDataQueryString);
					$editUserDataStatement->bindValue(":email", $_POST["email"]);
					$editUserDataStatement->bindValue(":profilePicture", $_FILES["profilePicture"]["name"]);

					if($editUserDataStatement->execute()) {
						setNotification("message", "Gegevens werden succesvol gewijzigd", "gegevens-wijzigen-form.php");
						$_SESSION["email"] = $_POST["email"];
					}
				}
			}
		}
	}
	catch(Exception $e) {
		setNotification("error", $e->getMessage(), "gegevens-wijzigen-form.php");
	}

	function setNotification($type, $message, $location) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: " . $location);
	}
?>