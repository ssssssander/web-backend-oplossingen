<?php
	session_start();

	$street = (isset($_SESSION["street"]) ? $_SESSION["street"] : "");
	$number = (isset($_SESSION["number"]) ? $_SESSION["number"] : "");
	$city = (isset($_SESSION["city"]) ? $_SESSION["city"] : "");
	$postalCode = (isset($_SESSION["postalCode"]) ? $_SESSION["postalCode"] : "");

	if(isset($_POST["email"]) && isset($_POST["nickname"])) {
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["nickname"] = $_POST["nickname"];
	}

	if(!isset($_SESSION["email"]) || !isset($_SESSION["nickname"])) {
		header("Location: oplossing-sessions-pagina-01-registratie.php");
	}

	if(isset($_POST["destroySession"])) {
		session_destroy();
		header("Location: " . $_SERVER["PHP_SELF"]);
	}
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
		<h1>Registratiegegevens</h1>
		<ul>
			<li>E-mail: <?= $_SESSION["email"] ?></li>
			<li>Nickname: <?= $_SESSION["nickname"] ?></li>
		</ul>
		<h1>Deel 2: adres</h1>
		<form action="oplossing-sessions-pagina-03-overzicht.php" method="post">
			<label for="street">Straat</label><input type="text" id="street" name="street"
			value="<?= $street ?>" <?= (isset($_GET["edit"]) && $_GET["edit"] == "street") ? "autofocus" : "" ?> required>
			<label for="number">Nummer</label><input type="text" id="number" name="number"
			value="<?= $number ?>" <?= (isset($_GET["edit"]) && $_GET["edit"] == "number") ? "autofocus" : "" ?> required>
			<label for="city">Gemeente</label><input type="text" id="city" name="city"
			value="<?= $city ?>" <?= (isset($_GET["edit"]) && $_GET["edit"] == "city") ? "autofocus" : "" ?> required>
			<label for="postal-code">Postcode</label><input type="text" id="postal-code" name="postalCode"
			value="<?= $postalCode?>" <?= (isset($_GET["edit"]) && $_GET["edit"] == "postalCode") ? "autofocus" : "" ?> required>
			<input type="submit" value="Volgende">
		</form>
		<p></p>
		<form action="" method="post">
			<input type="submit" name="destroySession" value="Vernietig session">
		</form>
		<a href="oplossing-sessions-pagina-01-registratie.php">Terug</a>
	</body>
</html>