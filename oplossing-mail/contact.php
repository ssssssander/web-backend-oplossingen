<?php
	session_start();

	spl_autoload_register(function ($class) {
		include "classes/" . $class . ".php";
	});

	try {
		if(isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["message"])) {
			try {
				$db = 	new PDO("mysql:host=localhost;dbname=opdracht-mail", "root", "Ikzagtweeberenbroodjessmeren",
						array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$addMessageStatement = $db->prepare("INSERT INTO contact_messages (email, message, time_sent)
													VALUES (:email, :message, NOW())");

				$addMessageStatement->bindValue(":email", $_POST["email"]);
				$addMessageStatement->bindValue(":message", $_POST["message"]);

				if($addMessageStatement->execute()) {
					$admin = "sander.borret@student.kdg.be";
					$title = "Mail van " . $_POST["email"];

					$headers = "From: " . $_POST["email"] . "\r\n";
					$headers .= "Reply-To: ". $_POST["email"] . "\r\n";
					if(isset($_POST["sendCopy"])) $headers .= "CC: " . $_POST["email"] . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					if(mail($admin, $title, $_POST["message"], $headers)) {
						forget();
						new Notification("message", "De mail werd met succes verstuurd", "contact-form.php");
					}
					else {
						throw new Exception("De mail kan niet verzonden worden");
					}
				}
				else {
					throw new Exception("De mail kan niet toegevoegd worden aan de databank");
				}
			}
			catch (PDOException $e) {
				remember();
				new Notification("error", "Kan geen verbinding maken met de databank: " . $e->getMessage(), "contact-form.php");
			}
		}
		else {
			throw new Exception("Niet alle velden zijn verzonden");
		}
	}
	catch(Exception $e) {
		remember();
		new Notification("error", $e->getMessage(), "contact-form.php");
	}

	function remember() {
		if(isset($_POST["email"])) $_SESSION["remember"]["email"] = $_POST["email"];
		if(isset($_POST["message"])) $_SESSION["remember"]["message"] = $_POST["message"];
		if(isset($_POST["sendCopy"])) $_SESSION["remember"]["sendCopy"] = "checked";
	}

	function forget() {
		unset($_SESSION["remember"]);
	}
?>