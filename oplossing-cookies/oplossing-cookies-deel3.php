<?php
	$message = "";
	$loggedIn = false;
	$usersTextFile = file_get_contents("gebruikers.txt");
	$user = explode(",", $usersTextFile);

	if(isset($_POST["submit"])) {
		if($_POST["username"] == $user[0] && $_POST["password"] == $user[1]) {
				if(isset($_POST["rememberMe"])) {
					setcookie("loggedIn", true, time() + 2592000);
				}
				else {
					setcookie("loggedIn", true);
				}
			header("Location: " . $_SERVER["PHP_SELF"]);
		}
		else {
			$message = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
		}
	}

	if(isset($_COOKIE["loggedIn"])) {
		$loggedIn = true;
	}

	if(isset($_GET["logOut"])) {
		setcookie("loggedIn", "", 1);
		setcookie("loggedIn", false);
		unset($_COOKIE["loggedIn"]);
		header("Location: " . $_SERVER["PHP_SELF"]);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			input:not([type=checkbox]) {
				display: block;
			}
		</style>
	</head>
	<body>
		<?php if($loggedIn): ?>
			<h1>Dashboard</h1>
			<p>Hallo Jan, fijn dat je er weer bij bent!</p>
			<a href="<?= $_SERVER["PHP_SELF"] . "?logOut=true" ?>">Uitloggen</a>
		<?php else: ?>
			<h1>Inloggen</h1>
			<?php if($message): ?>
				<h2><?= $message ?></h2>
			<?php endif ?>
			<form action="" method="post">
				<label for="username">Gebruikersnaam</label><input type="text" name="username" id="username" required>
				<label for="password">Wachtwoord</label><input type="password" name="password" id="password" required>
				<input type="checkbox" name="rememberMe" id="remember-me"><label for="remember-me">Mij onthouden</label>
				<input type="submit" name="submit">
			</form>
		<?php endif ?>
	</body>
</html>