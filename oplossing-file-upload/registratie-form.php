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
			label, input[name=register] {
				display: block;
			}
			.error {
				color: #831f1d;
				background-color: #ea9494;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<h1>Registreren</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<form action="registratie-process.php" method="post">
			<label for="email">e-mail</label>
			<input type="text"  id="email" name="email"
			value=<?= isset($_SESSION["formData"]) ? $_SESSION["formData"]["email"] : "" ?>>
			<label for="password">paswoord</label>
			<input type=<?= isset($_SESSION["formData"]) ? $_SESSION["formData"]["inputType"] : "password" ?>
			id="password" name="password" value=<?= isset($_SESSION["formData"]) ? $_SESSION["formData"]["password"] : "" ?>>
			<input type="submit" value="Genereer paswoord" name="generatePassword">
			<input type="submit" value="Registreer" name="register">
		</form>
	</body>
</html>
<?php
	session_unset();
?>