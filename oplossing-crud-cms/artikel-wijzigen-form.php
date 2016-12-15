<?php
	session_start();

	if(isset($_GET["artikel"])) {
		$_SESSION["articleId"] = $_GET["artikel"];
		
		try {
			$db = 	new PDO("mysql:host=localhost;dbname=opdracht-crud-cms", "root", "Ikzagtweeberenbroodjessmeren",
					array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$articleInfoQueryString = 	"SELECT id, titel, artikel, kernwoorden, datum
										FROM artikels
										WHERE id = :id AND is_archived = 0";

			$articleInfoStatement = $db->prepare($articleInfoQueryString);
			$articleInfoStatement->bindValue(":id", $_GET["artikel"]);

			if($articleInfoStatement->execute()) {
				$articles = array();

				while($row = $articleInfoStatement->fetch(PDO::FETCH_ASSOC)) {
					array_push($articles, $row);
				}
			}
			else {
				setNotification("error", "Er ging iets mis bij het ophalen van het artikel", "artikel-overzicht.php");
			}
		}
		catch (PDOException $e) {
			setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage(), "artikel-overzicht.php");
		}
	}

	function setNotification($type, $message, $location) {
		$_SESSION["notification"]["type"] = $type;
		$_SESSION["notification"]["message"] = $message;
		header("Location: " . $location);
	}
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
			.message {
				color: #3a831d;
				background-color: #9aea94;
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
		<h1>Artikel wijzigen</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<?php if(isset($articles)): ?>
			<form action="artikel-wijzigen-process.php" method="post">
				<?php foreach($articles as $article): ?>
				<label for="title">Titel</label>
				<input type="text" id="title" name="title" value=<?= $article["titel"] ?>>
				<label for="article">Artikel</label>
				<textarea id="article" name="article"><?= $article["artikel"] ?></textarea>
				<label for="keywords">Kernwoorden</label>
				<input type="text" id="keywords" name="keywords" value=<?= $article["kernwoorden"] ?>>
				<label for="date">Datum (dd-mm-jjjj)</label>
				<input type="text" id="date" name="date"value=<?= $article["datum"] ?>>
				<input type="hidden" name="id" value=<?= $article["id"] ?>>
				<input type="submit" name="submit" value="Artikel wijzigen">
				<?php endforeach ?>
			</form>
		<?php endif ?>
	</body>
</html>
<?php
	unset($_SESSION["notification"]);
?>