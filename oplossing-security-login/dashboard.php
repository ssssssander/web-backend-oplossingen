<?php
	session_start();

	if(isset($_COOKIE["login"])) {
		$email = explode(",", $_COOKIE["login"])[0];
		$hashedEmail = explode(",", $_COOKIE["login"])[1];

		try {
			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-security-login", "root", "Ikzagtweeberenbroodjessmeren",
					array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$validateUserQueryString = "SELECT salt
										FROM users
										WHERE email = :email";

			$validateUserStatement = $db->prepare($validateUserQueryString);
			$validateUserStatement->bindValue(":email", $email);

			if($validateUserStatement->execute()) {
				$salt = $validateUserStatement->fetch()["salt"];

				if(hash("sha512", $email . $salt) !== $hashedEmail) {
					setcookie("login", "", 1);
					setcookie("login", false);
					unset($_COOKIE["login"]);
					setNotification("error", "Sjoemelaar!");
				}
			}
			else {
				setNotification("error", "Er ging iets mis bij de validatie");
			}
		}
		catch(PDOException $e) {
			setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage());
		}
	}
	else {
		setNotification("error", "U moet eerst inloggen");
	}

	function setNotification($type, $message) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: login-form.php");
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Dashboard</h1>
		<form action="logout.php" method="post">
			<input type="submit" name="logout" value="Uitloggen">
		</form>
	</body>
</html>