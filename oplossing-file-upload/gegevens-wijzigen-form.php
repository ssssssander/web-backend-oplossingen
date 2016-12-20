<?php
	session_start();

	try {
		$db = 	new PDO("mysql:host=localhost;dbname=opdracht-file-upload", "root", "Ikzagtweeberenbroodjessmeren",
				array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$userInfoQueryString = 	"SELECT profile_picture, email
								FROM users
								WHERE email = :email";

		$userInfoStatement = $db->prepare($userInfoQueryString);
		$userInfoStatement->bindValue(":email", $_SESSION["email"]);

		if($userInfoStatement->execute()) {
			$userInfo = array();

			while($row = $userInfoStatement->fetch(PDO::FETCH_ASSOC)) {
				array_push($userInfo, $row);
			}
		}
		else {
			setNotification("error", "Er ging iets mis bij het ophalen van gebruikersinformatie", "dashboard.php");
		}
	}
	catch(PDOException $e) {
		setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage(), "dashboard.php");
	}

	function setNotification($type, $message, $location) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: " . $location);
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
			.message {
				color: #3a831d;
				background-color: #9aea94;
				padding: 5px;
			}
			img {
				max-width: 400px;
			}
			input, label {
				display: block;
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
		<h1>Gegevens wijzigen</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<form action="gegevens-bewerken.php" method="post" enctype="multipart/form-data">
			<?php foreach($userInfo as $info): ?>
				<label for="profile-picture">Profielfoto</label>
				<img src=<?= !empty($info["profile_picture"]) ?  "img/" . $info["profile_picture"] : "img/default.png" ?>
				alt=<?= $_SESSION["email"] ?>>
				<input type="file" id="profile-picture" name="profilePicture">
				<label for="email">E-mail</label>
				<input type="text" id="email" name="email" value=<?= $info["email"] ?>>
				<input type="submit" name="submit" value="Gegevens wijzigen">
			<?php endforeach ?>
		</form>
	</body>
</html>
<?php
	unset($_SESSION["notification"]);
?>