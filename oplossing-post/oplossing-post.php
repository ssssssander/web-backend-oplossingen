<?php
	$password = "scoobydoo123";
	$username = "sander";
	$message = "";

	if(isset($_POST["password"]) && isset($_POST["username"])) {
		if($_POST["password"] == $password && $_POST["username"] == $username) {
			$message = "Welkom!";
		}
		else {
			$message = "Er ging iets mis bij het inloggen, probeer opnieuw";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Inloggen</h1>
		<form action="oplossing-post.php" method="post">
			<label for="username">Gebruikersnaam</label><input type="text" name="username" id="username" style="display:block;">
			<label for="password">Paswoord</label><input type="password" name="password" id="password" style="display:block;">
			<input type="submit">
		</form>
		<h2><?= $message ?></h2>
	</body>
</html>