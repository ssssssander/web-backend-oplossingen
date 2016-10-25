<?php
	session_start();

	if(isset($_POST["street"]) && isset($_POST["number"]) && isset($_POST["city"]) && isset($_POST["postalCode"])) {
		$_SESSION["street"] = $_POST["street"];
		$_SESSION["number"] = $_POST["number"];
		$_SESSION["city"] = $_POST["city"];
		$_SESSION["postalCode"] = $_POST["postalCode"];
	}

	if(!isset($_SESSION["email"]) || !isset($_SESSION["nickname"]) || !isset($_SESSION["street"]) || !isset($_SESSION["number"])
		|| !isset($_SESSION["city"]) || !isset($_SESSION["postalCode"])) {
		header("Location: oplossing-sessions-pagina-01-registratie.php");
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Overzichtspagina</h1>
		<ul>
			<?php foreach($_SESSION as $key => $item): ?>
				<?php if($key == "email" || $key == "nickname"): ?>
					<li><?= $key . ": " . $item ?> | <a href="oplossing-sessions-pagina-01-registratie.php?edit=<?= $key ?>">Wijzig</a></li>
				<?php else: ?>
					<li><?= $key . ": " . $item ?> | <a href="oplossing-sessions-pagina-02-adres.php?edit=<?= $key ?>">Wijzig</a></li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
		<a href="oplossing-sessions-pagina-02-adres.php">Terug</a>
	</body>
</html>