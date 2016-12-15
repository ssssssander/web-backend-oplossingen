<?php
	session_start();

	try {
		$db = 	new PDO("mysql:host=localhost;dbname=opdracht-crud-cms", "root", "Ikzagtweeberenbroodjessmeren",
				array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$displayArticlesQueryString = 	"SELECT id, titel, artikel, kernwoorden, datum, is_active
										FROM artikels
										WHERE is_archived = 0";

		$displayArticlesStatement = $db->prepare($displayArticlesQueryString);

		if($displayArticlesStatement->execute()) {
				if($displayArticlesStatement->columnCount() > 0) {
					$articles = array();
					
					while($row = $displayArticlesStatement->fetch(PDO::FETCH_ASSOC)) {
						array_push($articles, $row);
					}
				}
		}
		else {
			setNotification("error", "Er ging iets mis bij het tonen van de artikelen", "dashboard.php");
		}
	}
	catch (PDOException $e) {
		setNotification("error", "Kan geen verbinding maken met de databank. " . $e->getMessage(), "dashboard.php");
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
			body > ul:first-of-type, article > ul:nth-of-type(2) {
				list-style-type: none;
				padding: 0;
				margin: 0;
			}
			body > ul:first-of-type > li, article > ul:nth-of-type(2) > li {
				display: inline-block;
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
			article {
				padding: 10px;
				margin-top: 5px;
			}
			article > h1 {
				border-bottom: 1px solid #b1b1b1;
			}
			.inactive {
				background-color: #d8d8d8;
				border-radius: 5px;
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
		<h1>Overzicht van de artikels</h1>
		<?php if(isset($_SESSION["notification"])): ?>
			<div class=<?= $_SESSION["notification"]["type"] ?>><?= $_SESSION["notification"]["message"] ?></div>
		<?php endif ?>
		<a href="artikel-toevoegen-form.php">Voeg een artikel toe</a>
		<?php if(isset($articles)): ?>
			<?php foreach($articles as $article): ?>
				<article class=<?= $article["is_active"] == 0 ? "inactive" : "" ?>>
					<h1><?= $article["titel"] ?></h1>
					<ul>
						<li>Artikel: <?= $article["artikel"] ?></li>
						<li>Kernwoorden: <?= $article["kernwoorden"] ?></li>
						<li>Datum: <?= $article["datum"] ?></li>
					</ul>
					<ul>
						<li><a href="artikel-wijzigen-form.php?artikel=<?= $article["id"] ?>">artikel wijzigen</a></li> |
						<li>
							<a href="artikel-activeren.php?artikel=<?= $article["id"] ?>">
								<?= $article["is_active"] == 0 ? "artikel activeren" : "artikel deactiveren" ?>
							</a>
						</li> |
						<li><a href="artikel-verwijderen.php?artikel=<?= $article["id"] ?>">artikel verwijderen</a></li>
					</ul>
				</article>
			<?php endforeach ?>
		<?php else: ?>
			<p>Geen artikels gevonden</p>
		<?php endif ?>
	</body>
</html>