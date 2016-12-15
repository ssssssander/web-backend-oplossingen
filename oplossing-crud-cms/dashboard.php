<?php
	session_start();

	if(isset($_COOKIE["login"])) {
		$email = explode(",", $_COOKIE["login"])[0];
		$_SESSION["email"] = $email;
		$hashedEmail = explode(",", $_COOKIE["login"])[1];

		try {
			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-crud-cms", "root", "Ikzagtweeberenbroodjessmeren",
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
	<head>
		<style>
			ul:first-of-type {
				list-style-type: none;
				padding: 0;
				margin: 0;
			}
			ul:first-of-type > li {
				display: inline-block;
			}
			.error {
				color: #831f1d;
				background-color: #ea9494;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<ul>
			<li><a href="dashboard.php">Terug naar dashboard</a></li> |
			<li>Ingelogd als <?= $_SESSION["email"] ?></li> |
			<li>
				<form action="logout.php" method="post">
					<input type="submit" name="logout" value="Uitloggen">
				</form>
			</li>
		</ul>
		<h1>Dashboard</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<ul>
			<li><a href="artikel-overzicht.php">Artikels</a></li>
		</ul>
	</body>
</html>
<?php
	unset($_SESSION["notification"]);
?>