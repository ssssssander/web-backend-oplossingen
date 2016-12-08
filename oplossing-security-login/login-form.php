<?php
	session_start();

	if(isset($_COOKIE["login"])) {
		header("Location: dashboard.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			input {
				display: block;
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
		</style>
	</head>
	<body>
		<h1>Inloggen</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<form action="login-process.php" method="post">
			<label for="email">e-mail</label>
			<input type="text" id="email" name="email">
			<label for="password">paswoord</label>
			<input type="password" id="password" name="password">
			<input type="submit" value="Inloggen" name="login">
		</form>
		<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a>.</p>
	</body>
</html>
<?php
	session_unset();
?>