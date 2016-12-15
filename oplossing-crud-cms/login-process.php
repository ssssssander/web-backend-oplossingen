<?php
	session_start();

	header("Location: login-form.php");

	if(isset($_POST["login"])) {
		try {
			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-crud-cms", "root", "Ikzagtweeberenbroodjessmeren",
						array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$emailQueryString = "SELECT *
								FROM users
								WHERE email = :email";

			$emailStatement = $db->prepare($emailQueryString);
			$emailStatement->bindValue(":email", $_POST["email"]);

			if($emailStatement->execute() && $emailStatement->rowCount() === 1) {
				$row = $emailStatement->fetch(PDO::FETCH_ASSOC);
				$salt = $row["salt"];
				$hashedPassword = $row["hashed_password"];
				$hashedEmail = hash("sha512",  $_POST["email"] . $salt);

				if(hash("sha512", $_POST["password"] . $salt) === $hashedPassword) {
					setcookie("login", $_POST["email"] . "," . $hashedEmail, time()+60*60*24*30);
					header("Location: dashboard.php");
				}
				else {
					setNotification("error", "Fout wachtwoord");
				}
			}
			else {
				setNotification("error", "Dit e-maildres werd niet teruggevonden");
			}
		}
		catch(PDOException $e) {
			setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage());
		}
	}
	
	function setNotification($type, $message) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: login-form.php");
	}
?>