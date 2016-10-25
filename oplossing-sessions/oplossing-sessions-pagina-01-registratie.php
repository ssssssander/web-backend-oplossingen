<?php
	session_start();

	$email = (isset($_SESSION["email"]) ? $_SESSION["email"] : "");
	$nickname = (isset($_SESSION["nickname"]) ? $_SESSION["nickname"] : "");
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			input {
				display: block;
			}
		</style>
	</head>
	<body>
		<h1>Deel 1: registratiegegevens</h1>
		<form action="oplossing-sessions-pagina-02-adres.php" method="post">
			<label for="email">E-mail</label><input type="email" id="email" name="email"
			value="<?= $email ?>" <?= (isset($_GET["edit"]) && $_GET["edit"] == "email") ? "autofocus" : "" ?> required>
			<label for="nickname"">Nickname</label><input type="text" id="nickname" name="nickname"
			value="<?= $nickname ?>" <?= (isset($_GET["edit"]) && $_GET["edit"] == "nickname") ? "autofocus" : "" ?> required>
			<input type="submit" value="Volgende">
		</form>
	</body>
</html>