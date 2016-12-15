<?php
	session_start();
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
			textarea, input:not([type=submit]) {
				display: block;
				width: 500px;
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
		<p><a href="artikel-overzicht.php">Terug naar overzicht</a></p>
		<h1>Artikel toevoegen</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<form action="artikel-toevoegen-process.php" method="post">
			<label for="title">Titel</label>
			<input type="text" id="title" name="title">
			<label for="article">Artikel</label>
			<textarea id="article" name="article"></textarea>
			<label for="keywords">Kernwoorden</label>
			<input type="text" id="keywords" name="keywords">
			<label for="date">Datum (dd-mm-jjjj)</label>
			<input type="text" id="date" name="date">
			<input type="submit" name="submit" value="Artikel toevoegen">
		</form>
	</body>
</html>
<?php
	unset($_SESSION["notification"]);
?>