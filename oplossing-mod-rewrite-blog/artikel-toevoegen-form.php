<?php
	session_start();

	spl_autoload_register(function ($class) {
		include "classes/" . $class . ".php";
	});
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<style>
			.notification {
				padding: 5px;
			}
			.error {
				color: #831f1d;
				background-color: #ea9494;
			}
			.message {
				color: #3a831d;
				background-color: #9aea94;
			}
		</style>
	</head>
	<body>
		<h1>Artikel toevoegen</h1>
		<a href="artikel-overzicht.php">Terug naar overzicht</a>
		<?php if(Notification::exists()): ?>
			<p class="notification <?= Notification::get("type") ?>"><?= Notification::get("text") ?></p>
		<?php endif ?>
		<form action="artikel-toevoegen.php" method="post">
			<label for="title">Titel</label>
			<input type="text" name="title" id="title" value=<?= InputSaver::get() ?>>
			<label for="article">Artikel</label>
			<textarea name="article" id="article"><?= InputSaver::get() ?></textarea>
			<label for="keywords">Kernwoorden</label>
			<input type="text" name="keywords" id="keywords" value=<?= InputSaver::get() ?>>
			<label for="date">Datum</label>
			<input type="date" name="date" id="date" value=<?= InputSaver::get() ?>>
			<input type="submit" name="submit">
		</form>
	</body>
</html>