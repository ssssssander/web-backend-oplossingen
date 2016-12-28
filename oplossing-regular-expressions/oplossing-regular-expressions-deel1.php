<?php
	session_start();

	spl_autoload_register(function ($class) {
		include "classes/" . $class . ".php";
	});

	if(isset($_POST["submit"])) {
		$result = preg_replace("/" . $_POST["regex"] . "/", "<span style='color: #ff0000;'>#</span>", $_POST["string"]);
		new InputSaver(["regex", "string"]);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<h1>RegEx tester</h1>
		<form action="" method="post">
			<label for="regex">Regular Expression</label>
			<input type="text" name="regex" id="regex" value=<?= InputSaver::get() ?>>
			<label for="string">String</label>
			<textarea name="string" id="string"><?= InputSaver::get() ?></textarea>
			<input type="submit" name="submit">
		</form>
		<?php if(isset($result)): ?>
			<p><?= $result ?></p>
		<?php endif ?>
	</body>
</html>