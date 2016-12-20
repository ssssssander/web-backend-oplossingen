<?php
	session_start();

	header("Location: login-form.php");

	if(isset($_POST["generatePassword"])) {
		$generatedPassword = generatePassword(true, true, true, true, 12);
		$_SESSION["formData"]["email"] = $_POST["email"];
		$_SESSION["formData"]["password"] = $generatedPassword;
		$_SESSION["formData"]["inputType"] = "text";
		header("Location: registratie-form.php");
	}

	if(isset($_POST["register"])) {
		if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			try {
				$db = 	new PDO("mysql:host=localhost;dbname=opdracht-file-upload", "root", "Ikzagtweeberenbroodjessmeren",
						array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$emailQueryString = "SELECT email
									FROM users
									WHERE email = :email";

				$emailStatement = $db->prepare($emailQueryString);
				$emailStatement->bindValue(":email", $_POST["email"]);

				if($emailStatement->execute() && $emailStatement->rowCount() === 0) {
					$salt = uniqid(mt_rand(), true);
					$hashedEmail = hash("sha512",  $_POST["email"] . $salt);
					$hashedPassword = hash("sha512",  $_POST["password"] . $salt);

					$addUserQueryString = 	"INSERT INTO users (email, salt, hashed_password, last_login_time)
											VALUES (:email, :salt, :hashedPassword, NOW())";

					$addUserStatement = $db->prepare($addUserQueryString);
					$addUserStatement->bindValue(":email", $_POST["email"]);
					$addUserStatement->bindValue(":salt", $salt);
					$addUserStatement->bindValue(":hashedPassword", $hashedPassword);

					if($addUserStatement->execute()) {
						setcookie("login", $_POST["email"] . "," . $hashedEmail, time()+60*60*24*30);
						header("Location: dashboard.php");
					}
					else {
						setNotification("error", "Er ging iets mis bij het registreren");
					}
				}
				else {
					setNotification("error", "Dit e-mailadres bestaat al");
				}
			}
			catch (PDOException $e) {
				setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage());
			}
		}
		else {
			setNotification("error", "Ongeldig e-mailadres");
		}
	}

	function generatePassword($hasUppercase, $hasLowercase, $hasDigits, $hasSpecialChars, $length) {
		$possibleChars = "";
		$password = "";

		if($hasUppercase) $possibleChars .= implode("", range("A", "Z"));
		if($hasLowercase) $possibleChars .= implode("", range("a", "z"));
		if($hasDigits) $possibleChars .= implode("", range(0, 9));
		if($hasSpecialChars) $possibleChars .= "%#$@&[]()!?{};:=+-*/";

		$possibleCharsCount = strlen($possibleChars);

		for($i = 0; $i < $length; $i++) {
			$randomIndex = rand(0, $possibleCharsCount - 1);
			
			$password .= $possibleChars[$randomIndex];
		}
		return $password;
	}

	function setNotification($type, $message) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: registratie-form.php");
	}
?>